<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LibraryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('library_events')->insert([
            [
                'judul' => 'Workshop Literasi Digital',
                'deskripsi' => 'Pelatihan bagi mahasiswa tentang pentingnya literasi digital dan penggunaan database ilmiah.',
                'tempat' => 'Ruang Seminar Perpustakaan',
                'tanggal_mulai' => '2025-08-10',
                'tanggal_selesai' => '2025-08-10',
                'penyelenggara' => 'Perpustakaan UMHT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Pameran Buku dan Karya Mahasiswa',
                'deskripsi' => 'Pameran koleksi buku baru serta hasil karya ilmiah mahasiswa dari berbagai program studi.',
                'tempat' => 'Lobi Perpustakaan',
                'tanggal_mulai' => '2025-08-20',
                'tanggal_selesai' => '2025-08-22',
                'penyelenggara' => 'Unit Pustaka & Dokumentasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Webinar Penelusuran Informasi Akademik',
                'deskripsi' => 'Kegiatan daring untuk membekali mahasiswa dengan keterampilan menelusur informasi ilmiah.',
                'tempat' => 'Zoom Meeting',
                'tanggal_mulai' => '2025-09-05',
                'tanggal_selesai' => '2025-09-05',
                'penyelenggara' => 'Pustikom UMHT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
