<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index() {
        return view('admin.pembayaran');
    }

    public function tambahPembayaran() {
        return view('admin.tambahpembayaran');
    }
}
