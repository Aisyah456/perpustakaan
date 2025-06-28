<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artikels')->insert([
            [
                'judul' => 'Perpustakaan Digital Resmi Diluncurkan',
                'tanggal' => '2025-04-01',
                'img' => 'perpustakaan-digital.jpg',
                'isi' => 'Perpustakaan Universitas Mohammad Husni Thamrin kini menghadirkan layanan digital yang dapat diakses 24 jam. Mahasiswa dan dosen dapat mengakses e-book, jurnal ilmiah, dan repository kampus dari mana saja.',
                'admin' => 'Admin Perpustakaan',
                'category' => 'Berita',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Tips Mencari Referensi Ilmiah yang Valid',
                'tanggal' => '2025-03-25',
                'img' => 'tips-referensi.jpg',
                'isi' => 'Dalam menulis karya ilmiah, penting bagi mahasiswa untuk mengetahui cara mencari referensi yang valid dan kredibel. Artikel ini membahas berbagai sumber yang dapat digunakan dalam penelitian.',
                'admin' => 'Tim Layanan Referensi',
                'category' => 'Artikel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Pelatihan Turnitin untuk Mahasiswa Tingkat Akhir',
                'tanggal' => '2025-03-20',
                'img' => 'pelatihan-turnitin.jpg',
                'isi' => 'Guna mendukung integritas akademik, perpustakaan menyelenggarakan pelatihan Turnitin bagi mahasiswa akhir. Pelatihan ini mengajarkan cara mengecek plagiarisme sebelum sidang.',
                'admin' => 'Layanan Akademik',
                'category' => 'Agenda',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Koleksi Buku Terbaru Bulan April 2025',
                'tanggal' => '2025-04-10',
                'img' => 'koleksi-april.jpg',
                'isi' => 'Perpustakaan menambahkan 50 koleksi buku baru di bidang kesehatan, teknologi, dan manajemen. Koleksi ini dapat dipinjam mulai 12 April 2025.',
                'admin' => 'Admin Koleksi',
                'category' => 'Koleksi Terbaru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Jam Layanan Perpustakaan Selama UAS',
                'tanggal' => '2025-04-15',
                'img' => 'jam-layanan.jpg',
                'isi' => 'Selama Ujian Akhir Semester, jam operasional perpustakaan diperpanjang hingga pukul 21.00 WIB untuk mendukung proses belajar mahasiswa.',
                'admin' => 'Humas Perpustakaan',
                'category' => 'Berita',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Panduan Layanan Referensi Online',
                'tanggal' => '2025-03-29',
                'img' => 'layanan-referensi.jpg',
                'isi' => 'Mahasiswa dapat memanfaatkan layanan referensi online untuk meminta bantuan pencarian literatur. Layanan ini aktif setiap hari kerja melalui website perpustakaan.',
                'admin' => 'Referensi Online',
                'category' => 'Artikel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
