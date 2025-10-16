<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Vtiful\Kernel\Format;

class PembayaranController extends Controller
{
    public function index() {
        $pembayaran = Pembayaran::with('siswa', 'spp')->get();
        return view('admin.pembayaran', compact('pembayaran'));
    }

    public function tambahPembayaran() {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('admin.tambahpembayaran', compact('siswa', 'spp'));
    }

    public function store(Request $request) {

        Pembayaran::create([
            'id_pembayaran' => $request->input('id_pembayaran'),
            'nis' => $request->input('nis'),
            'tgl_bayar' => now()->toDateString(),
            'bulan_dibayar' => $request->input('bulan_dibayar'),
            'tahun_dibayar' => $request->input('tahun_dibayar'),
            'jumlah_bayar' => $request->input('jumlah_bayar'),
            'keterangan' => $request->input('keterangan', null),
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    public function editPembayaran($id) {
        $pembayaran = Pembayaran::findOrFail($id);
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('admin.editpembayaran', compact('pembayaran', 'siswa', 'spp'));
    }
}
