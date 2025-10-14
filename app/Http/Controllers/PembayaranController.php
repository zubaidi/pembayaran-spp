<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index() {
        $pembayaran = Pembayaran::with('siswa', 'spp')->get();
        return view('admin.pembayaran', compact('pembayaran'));
    }

    public function tambahPembayaran() {
        return view('admin.tambahpembayaran');
    }
}
