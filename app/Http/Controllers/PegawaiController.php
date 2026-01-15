<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Tampil data di Landing Page
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    // Halaman tambah data
    public function create()
    {
        return view('pegawai.create');
    }

    // Simpan data ke database
    public function store(Request $request)
    {
        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Ditambah!');
    }

    // Halaman edit data
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    // Update data
    public function update(Request $request, Pegawai $pegawai)
    {
        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil Diubah!');
    }

    // Hapus data
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil Dihapus!');
    }
}