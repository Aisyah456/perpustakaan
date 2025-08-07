<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InformationLiteracySeeder extends Seeder
{
    public function run()
    {
        DB::table('information_literacies')->insert([
            [
                'judul_pelatihan' => 'Pelatihan Literasi Informasi Mahasiswa Baru',
                'deskripsi' => 'Pelatihan ini ditujukan untuk mengenalkan layanan perpustakaan dan keterampilan pencarian informasi.',
                'narasumber' => 'Dr. Andi Supriyanto, M.Si.',
                'tanggal' => '2025-08-15',
                'waktu' => '09.00 - 11.00',
                'lokasi' => 'Aula Perpustakaan Lt. 2',
                'link_pendaftaran' => 'https://bit.ly/daftar-literasi-2025',
                'poster' => 'poster-literasi-1.jpg',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'judul_pelatihan' => 'Workshop Akses Jurnal Online dan e-Resources',
                'deskripsi' => 'Pelatihan ini membantu mahasiswa dan dosen untuk memanfaatkan jurnal online yang dilanggan oleh perpustakaan.',
                'narasumber' => 'Prof. Dr. Lestari Widya, M.Hum.',
                'tanggal' => '2025-09-01',
                'waktu' => '10.00 - 12.00',
                'lokasi' => 'Zoom Meeting (link menyusul)',
                'link_pendaftaran' => null,
                'poster' => null,
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
