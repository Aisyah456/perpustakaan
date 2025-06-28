<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class CekPinjamanController extends Controller
{
    public function index()
    {
        return view('home.layanan.cek_peminjaman.from');
    }

    public function cek(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
        ]);

        $loans = Loan::where('nim', $request->nim)->orderBy('tanggal_pinjam', 'desc')->get();

        return view('home.layanan.cek_peminjaman.hasil', compact('loans'));
    }
}
