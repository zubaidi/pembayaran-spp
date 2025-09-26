<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::with('kelas', 'spp')->get();
        return view('admin.siswa', compact('siswa'));
    }

    public function tambahSiswa() {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.tambahsiswa', compact('kelas', 'spp'));
    }

    public function store(Request $request) {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn',
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'id_kelas' => 'required|exists:kelas,id',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required|exists:spp,id',
        ]);
        Siswa::create([
            'nisn'  => $request->nisn,
            'nis'   => $request->nis,
            'nama'  => $request->nama,
            'id_kelas'  => $request->id_kelas,
            'alamat'  => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_spp'  => $request->id_spp,
            'created_at' => now()
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }
}
