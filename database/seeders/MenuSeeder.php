<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'judul' => 'AKSES SKRIPSI',
                'link' => '/akses-skripsi',
                'foto' => 'menu/skripsi.png',
                'description' => 'Layanan akses koleksi skripsi mahasiswa.',
            ],
            [
                'judul' => 'CEK TURNITIN',
                'link' => '/cek-turnitin',
                'foto' => 'menu/turnitin.png',
                'description' => 'Layanan cek plagiarisme dokumen akademik.',
            ],
            [
                'judul' => 'BEBAS PUSTAKA',
                'link' => '/bebas-pustaka',
                'foto' => 'menu/bebas.png',
                'description' => 'Surat keterangan bebas tanggungan pustaka.',
            ],
            [
                'judul' => 'PELATIHAN LITERASI',
                'link' => '/pelatihan-literasi',
                'foto' => 'menu/literasi.png',
                'description' => 'Pelatihan kemampuan literasi informasi digital.',
            ],
            [
                'judul' => 'ASK MYLIBRARIAN',
                'link' => '/ask-librarian',
                'foto' => 'menu/librarian.png',
                'description' => 'Layanan konsultasi dengan pustakawan.',
            ],
            [
                'judul' => 'AKUN PREMIUM',
                'link' => '/akun-premium',
                'foto' => 'menu/premium.png',
                'description' => 'Permintaan akun premium jurnal/ebook.',
            ],
            [
                'judul' => 'CEK PINJAMAN',
                'link' => '/cek-pinjaman',
                'foto' => 'menu/pinjaman.png',
                'description' => 'Melihat status peminjaman buku.',
            ],
            [
                'judul' => 'BOOKING FASILITAS',
                'link' => '/booking-fasilitas',
                'foto' => 'menu/fasilitas.png',
                'description' => 'Peminjaman ruang dan fasilitas perpustakaan.',
            ],
            [
                'judul' => 'PETA RISET MAHASISWA',
                'link' => '/peta-riset',
                'foto' => 'menu/riset.png',
                'description' => 'Visualisasi topik riset mahasiswa.',
            ],
            [
                'judul' => 'USULAN BUKU',
                'link' => '/usulan-buku',
                'foto' => 'menu/usulan.png',
                'description' => 'Pengajuan usulan koleksi buku baru.',
            ],
        ];

        DB::table('menus')->insert($menus);
    }
}
