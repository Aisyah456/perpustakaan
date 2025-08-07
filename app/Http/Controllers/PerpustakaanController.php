<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerpustakaanMisi;
use App\models\PerpustakaanVisi;

class PerpustakaanController extends Controller
{
    /**
     * Display the vision page
     */
    public function visi()
    {
        $visiData = PerpustakaanVisi::getActive();

        if (!$visiData) {
            return view('visi-perpustakaan');
        }

        $visi = [
            'title' => 'Visi Perpustakaan UMY',
            'description' => $visiData->deskripsi,
            'tahun_target' => $visiData->tahun_target,
            'points' => []
        ];

        foreach ($visiData->activePoin as $poin) {
            $visi['points'][] = [
                'number' => $poin->nomor,
                'text' => $poin->deskripsi
            ];
        }

        return view('visi-perpustakaan-dynamic', compact('visi'));
    }

    /**
     * Display the mission page
     */
    public function misi()
    {
        $misiData = PerpustakaanMisi::getActive();

        if (!$misiData) {
            return view('misi-perpustakaan');
        }

        $misi = [
            'title' => 'Misi Perpustakaan UMY',
            'description' => $misiData->deskripsi,
            'points' => []
        ];

        foreach ($misiData->activePoin as $poin) {
            $misi['points'][] = [
                'number' => $poin->nomor,
                'text' => $poin->deskripsi
            ];
        }

        return view('misi-perpustakaan', compact('misi'));
    }

    /**
     * Display the about page
     */
    public function tentang()
    {
        $about = [
            'title' => 'Tentang Perpustakaan UMY',
            'description' => 'Perpustakaan Universitas Muhammadiyah Yogyakarta sebagai pusat informasi dan pembelajaran',
            'history' => 'Sejarah dan perkembangan perpustakaan UMY...',
            'facilities' => [
                'Ruang baca yang nyaman',
                'Koleksi digital',
                'Akses internet gratis',
                'Layanan referensi'
            ]
        ];

        return view('tentang-perpustakaan', compact('about'));
    }
}
