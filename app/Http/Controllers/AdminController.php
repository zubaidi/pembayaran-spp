<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function index() {
        $siswa = Siswa::count('nisn');
        $kelas = Kelas::count();
        $spp = Spp::count();
        return view('admin.dashboard', compact('siswa', 'kelas', 'spp'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Login Berhasil!');
        } else {
            return back()->withErrors(['email' => 'Email atau Password tidak sesuai'])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logout Berhasil!');
    }
}
