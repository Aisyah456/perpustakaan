<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel news.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'judul' => 'Layanan Perpustakaan Digital Resmi Diluncurkan',
                'konten' => 'Perpustakaan Universitas Mohammad Husni Thamrin kini menghadirkan layanan perpustakaan digital yang dapat diakses oleh seluruh civitas akademika. Layanan ini memungkinkan mahasiswa dan dosen untuk mengakses e-book, jurnal, dan repository kampus secara online melalui website perpustakaan.',
                'img' => 'digital-library.jpg',
                'tanggal' => '2025-04-10',
                'by' => 'Admin Perpustakaan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Pelatihan Turnitin untuk Mahasiswa Tingkat Akhir',
                'konten' => 'Guna mendukung integritas akademik, perpustakaan menyelenggarakan pelatihan penggunaan Turnitin bagi mahasiswa tingkat akhir. Pelatihan ini bertujuan untuk membantu mahasiswa memahami cara cek plagiarisme sebelum mengunggah karya ilmiahnya.',
                'img' => 'pelatihan-turnitin.jpg',
                'tanggal' => '2025-03-30',
                'by' => 'Tim Layanan Referensi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Perpanjangan Jam Layanan Selama Ujian Akhir Semester',
                'konten' => 'Dalam rangka mendukung kegiatan belajar mahasiswa selama Ujian Akhir Semester (UAS), jam layanan perpustakaan diperpanjang hingga pukul 21.00 WIB. Layanan ini berlaku mulai 22 April hingga 3 Mei 2025.',
                'img' => 'jam-layanan-uji.jpg',
                'tanggal' => '2025-04-15',
                'by' => 'Humas Perpustakaan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul'   => 'Meningkatkan Literasi Digital di Era Modern',
                'konten'  => 'Literasi digital menjadi kunci utama dalam menghadapi tantangan zaman digital...',
                'img'     => 'literasi-digital.jpg',
                'tanggal' => Carbon::now()->subDays(3)->toDateString(),
                'by'      => 'Admin Perpustakaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul'   => 'Akses E-Resources Internasional Gratis',
                'konten'  => 'Mahasiswa kini dapat mengakses berbagai sumber e-resources secara gratis melalui kampus...',
                'img'     => 'e-resources.jpg',
                'tanggal' => Carbon::now()->subDays(2)->toDateString(),
                'by'      => 'Tim Pustikom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul'   => 'Pelatihan Penulisan Karya Ilmiah',
                'konten'  => 'Universitas mengadakan pelatihan intensif untuk meningkatkan kemampuan menulis karya ilmiah mahasiswa.',
                'img'     => 'pelatihan-ilmiah.jpg',
                'tanggal' => Carbon::now()->toDateString(),
                'by'      => 'Humas Universitas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
