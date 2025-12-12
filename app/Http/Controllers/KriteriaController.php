<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::latest()->get();
        return view('kriteria', compact('kriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'bobot' => 'required|numeric|min:0',
        ]);

        Kriteria::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'bobot' => $request->bobot,
            'aktif' => $request->aktif ? 1 : 0,
        ]);

        return back()->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $row = Kriteria::findOrFail($id);

        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'bobot' => 'required|numeric|min:0',
        ]);

        $row->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'bobot' => $request->bobot,
            'aktif' => $request->aktif ? 1 : 0,
        ]);

        return back()->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kriteria::findOrFail($id)->delete();
        return back()->with('success','Kriteria dihapus');
    }
}
