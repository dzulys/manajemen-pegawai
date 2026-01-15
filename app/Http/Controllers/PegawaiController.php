<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Employee::with('position')->get(); 
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $jabatan = Position::all();
        return view('pegawai.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:employees',
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'password' => 'required',
            'position_id' => 'required',
            'join_date' => 'required|date',
        ]);

        Employee::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'position_id' => $request->position_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'join_date' => $request->join_date,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Ditambah!');
    }

    public function edit($id)
    {
        $pegawai = Employee::findOrFail($id);
        $jabatan = Position::all();
        return view('pegawai.edit', compact('pegawai', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'position_id' => 'required',
        ]);

        $pegawai = Employee::findOrFail($id);
        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $pegawai = Employee::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Dihapus!');
    }
}