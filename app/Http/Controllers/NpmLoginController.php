<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NpmLoginController extends Controller
{
    public function showLogin()
    {
        return view('login.npm');
    }

    public function login(Request $request)
    {
        $request->validate([
            'npm' => 'required|digits:8'
        ]);

        $npm_terdaftar = ['202300001', '342017001', '3420190009'];

        if (in_array($request->npm, $npm_terdaftar)) {
            session::put('npm_logged_in', $request->npm);
            return redirect()->route('dokumen-internal', 'dokumen-eksternal');
        }

        return back()->withErrors(['npm' => 'NPM Tidak Ditemukan']);
    }
}
