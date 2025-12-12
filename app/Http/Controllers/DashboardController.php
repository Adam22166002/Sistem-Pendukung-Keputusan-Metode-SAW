<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\PeriodePenilaian;
use App\Models\Kriteria;
use App\Models\Penilaian;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $totalKaryawan = Karyawan::count();
    $totalPeriode = PeriodePenilaian::count();
    $totalKriteria = Kriteria::count();
    $totalPenilaian = Penilaian::count();

    $semuaPeriode = PeriodePenilaian::orderBy('id','desc')->get();

    if ($request->periode_id) {
        $periodeDipilih = PeriodePenilaian::find($request->periode_id);
    } else {
        $periodeDipilih = PeriodePenilaian::where('status','aktif')->first();
    }

    if (!$periodeDipilih) {
        return view('dashboard', [
            'totalKaryawan' => $totalKaryawan,
            'totalPeriode' => $totalPeriode,
            'totalKriteria' => $totalKriteria,
            'totalPenilaian' => $totalPenilaian,
            'periodeDipilih' => null,
            'semuaPeriode' => $semuaPeriode,
            'chartLabels' => [],
            'chartScores' => [],
        ]);
    }

    $chartLabels = [];
    $chartScores = [];

    $karyawanSemua = Karyawan::all();

    foreach ($karyawanSemua as $k) {
        $penilaian = Penilaian::where('periode_id', $periodeDipilih->id)
            ->where('karyawan_id', $k->id)
            ->first();

        $chartLabels[] = $k->nama;
        $chartScores[] = $penilaian ? floatval($penilaian->nilai_akhir) : 0;
    }

    return view('dashboard', [
        'totalKaryawan' => $totalKaryawan,
        'totalPeriode' => $totalPeriode,
        'totalKriteria' => $totalKriteria,
        'totalPenilaian' => $totalPenilaian,
        'periodeDipilih' => $periodeDipilih,
        'semuaPeriode' => $semuaPeriode,
        'chartLabels' => $chartLabels,
        'chartScores' => $chartScores,
    ]);
}

}