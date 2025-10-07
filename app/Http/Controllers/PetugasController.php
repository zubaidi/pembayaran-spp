<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PetugasController extends Controller
{
    
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas', compact('petugas'));
    }

    public function tambahPetugas()
    {
        return view('admin.tambahpetugas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Petugas::create([
            'id_petugas' => $request->id_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPetugas(Petugas $petugas)
    {
        return view('admin.editpetugas', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugas $petugas)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:25', Rule::unique('petugas')->ignore($petugas->id)],
            'nama_petugas' => 'required|string|max:50',
            'level' => 'required|in:admin,petugas',
        ]);

        $data = [
            'username' => $request->username,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ];

        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus.');
    }
}