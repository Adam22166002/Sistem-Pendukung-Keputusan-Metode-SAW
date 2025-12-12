<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\DetailPenilaian;
use App\Models\PeriodePenilaian;
use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\RangeNilai;
use App\Services\SawService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function proses(Request $request, $periode_id)
    {
        $karyawan = Karyawan::all();
        $kriteria = Kriteria::where('aktif', true)->get();
        $bobot = $kriteria->pluck('bobot', 'id')->toArray();
        $ranges = RangeNilai::all();

        $dataSaw = [];

        foreach ($karyawan as $item) {
            foreach ($kriteria as $kr) {
                $nilai_input = $request->input('nilai_' . $item->id . '_' . $kr->id);
                $rating = $ranges->first(fn($r) => $nilai_input >= $r->min && $nilai_input <= $r->max)->rating ?? 1;

                $dataSaw[$item->id]['nilai'][$kr->id] = $rating;
            }
        }

        $saw = new SawService();
        $normalized = $saw->normalize($dataSaw);
        $finalScores = $saw->calculateFinalScore($normalized, $bobot);

        $ranking = 1;
        foreach ($finalScores as $idKaryawan => $nilai) {
            $penilaian = Penilaian::create([
                'karyawan_id' => $idKaryawan,
                'periode_id' => $periode_id,
                'nilai_akhir' => $nilai,
                'peringkat' => $ranking++,
                'status' => 'biasa'
            ]);

            foreach ($kriteria as $kr) {
                DetailPenilaian::create([
                    'penilaian_id' => $penilaian->id,
                    'kriteria_id' => $kr->id,
                    'skor_asli' => $dataSaw[$idKaryawan]['nilai'][$kr->id],
                    'skor_normalisasi' => $normalized[$idKaryawan]['nil_norm'][$kr->id],
                    'skor_terbobot' => $normalized[$idKaryawan]['nil_norm'][$kr->id] * $bobot[$kr->id],
                ]);
            }
        }

        return back();
    }

    public function formInput($periode_id)
    {
        $periode = PeriodePenilaian::findOrFail($periode_id);
        $karyawan = Karyawan::all();
        $kriteria = Kriteria::where('aktif', true)->get();
        $semuaPeriode = PeriodePenilaian::orderBy('id', 'desc')->get();
        return view('penilaian.input', compact('periode', 'karyawan', 'kriteria', 'semuaPeriode'));
    }


    public function hasil($periode)
    {
        $periodeData = PeriodePenilaian::findOrFail($periode);

        $ranking = Penilaian::with(['karyawan', 'detail.kriteria'])
            ->where('periode_id', $periode)
            ->orderBy('nilai_akhir', 'desc')
            ->get();

        $semuaPeriode = PeriodePenilaian::orderBy('id', 'desc')->get();

        return view('penilaian.hasil', compact('ranking', 'periodeData', 'semuaPeriode'));
    }


    public function penilaianPdf($periode)
    {
        $periodeData = PeriodePenilaian::findOrFail($periode);
        $ranking = Penilaian::with('karyawan')->where('periode_id', $periode)->orderBy('peringkat', 'asc')->get();

        $pdf = Pdf::loadView('penilaian.pdf', compact('ranking', 'periodeData'))->setPaper('A4', 'portrait');
        return $pdf->download('laporan-penilaian-' . $periode . '.pdf');
    }
}
