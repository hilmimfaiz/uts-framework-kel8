<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftar::paginate(10);
        return view('pendaftar.index', compact('pendaftars'));
    }

    public function create()
    {
        return view('pendaftar.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_vaksin' => 'required|string|max:255',
            'lokasi_vaksin' => 'required|string|max:255',
            'tanggal_vaksin' => 'required|date',
            'status' => 'required|in:terdaftar,hadir,tidak_hadir',
        ]);

        Pendaftar::create($validatedData);

        return redirect()->route('pendaftar.index')
                         ->with('success', 'Data pendaftar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_vaksin' => 'required|string|max:255',
            'lokasi_vaksin' => 'required|string|max:255',
            'tanggal_vaksin' => 'required|date',
            'status' => 'required|in:terdaftar,hadir,tidak_hadir',
        ]);

        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update($validatedData);

        return redirect()->route('pendaftar.index')
                         ->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->route('pendaftar.index')
                         ->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function deleted()
    {
        $pendaftars = Pendaftar::onlyTrashed()->paginate(10);
        return view('pendaftar.deleted', compact('pendaftars'));
    }

    public function restore($id)
    {
        $pendaftar = Pendaftar::onlyTrashed()->where('id', $id)->firstOrFail();
        $pendaftar->restore();

        return redirect()->route('pendaftar.deleted')->with('success', 'Data berhasil dipulihkan!');
    }

    public function forceDelete($id)
    {
        $pendaftar = Pendaftar::onlyTrashed()->where('id', $id)->firstOrFail();
        $pendaftar->forceDelete();

        return redirect()->route('pendaftar.deleted')->with('success', 'Data berhasil dihapus permanen!');
    }
}
