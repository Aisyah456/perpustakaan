<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Article;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artikels')->insert([
            [
                'judul' => 'Manfaat e-Book dalam Proses Pembelajaran',
                'slug' => 'manfaat-e-book-dalam-proses-pembelajaran',
                'kutipan' => 'e-Book memudahkan akses literatur digital oleh mahasiswa.',
                'isi' => '<p>Dengan perkembangan teknologi, e-Book kini menjadi sumber referensi utama bagi mahasiswa dalam mendukung proses pembelajaran yang fleksibel.</p>',
                'img' => 'ebook.jpg',
                'link_akses' => 'https://perpustakaan.univ.ac.id/ebooks/manfaat-ebook.pdf',
                'category' => 'Literasi Digital',
                'admin' => 'Admin Perpustakaan',
                'tanggal' => Carbon::now(),
                'status' => 'terbit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Cara Akses Jurnal Online Melalui Perpustakaan',
                'slug' => 'cara-akses-jurnal-online',
                'kutipan' => 'Langkah-langkah mudah untuk mengakses jurnal elektronik dari database kampus.',
                'isi' => '<p>Mahasiswa dapat mengakses jurnal online melalui portal perpustakaan dengan login menggunakan akun masing-masing dan memilih database yang diinginkan.</p>',
                'img' => 'jurnal-online.jpg',
                'link_akses' => 'https://perpustakaan.univ.ac.id/jurnal-online',
                'category' => 'Akses Digital',
                'admin' => 'Admin Jurnal',
                'tanggal' => Carbon::now()->subDays(2),
                'status' => 'terbit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tips Menulis Kutipan dan Daftar Pustaka yang Benar',
                'slug' => 'tips-menulis-kutipan-dan-daftar-pustaka',
                'kutipan' => 'Hindari plagiarisme dengan menulis kutipan secara ilmiah.',
                'isi' => '<p>Mengutip sumber dengan format yang benar penting untuk kejujuran akademik. Gunakan gaya APA, MLA, atau Chicago sesuai kebutuhan.</p>',
                'img' => 'kutipan.jpg',
                'link_akses' => 'https://perpustakaan.univ.ac.id/downloads/kutipan-panduan.pdf',
                'category' => 'Panduan Akademik',
                'admin' => 'Admin Referensi',
                'tanggal' => Carbon::now()->subWeek(),
                'status' => 'terbit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Panduan Menggunakan OPAC Perpustakaan',
                'slug' => 'panduan-menggunakan-opac-perpustakaan',
                'kutipan' => 'OPAC memudahkan pencarian koleksi buku dan referensi lainnya.',
                'isi' => '<p>OPAC (Online Public Access Catalog) merupakan sistem pencarian koleksi yang dapat diakses oleh seluruh pengguna perpustakaan melalui website resmi.</p>',
                'img' => 'opac.jpg',
                'link_akses' => 'https://perpustakaan.univ.ac.id/opac',
                'category' => 'Layanan Perpustakaan',
                'admin' => 'Admin Sistem',
                'tanggal' => Carbon::now()->subDays(10),
                'status' => 'terbit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Perpustakaan Digital: Solusi Belajar Tanpa Batas',
                'slug' => 'perpustakaan-digital-solusi-belajar-tanpa-batas',
                'kutipan' => 'Akses buku dan referensi dari mana saja dan kapan saja.',
                'isi' => '<p>Perpustakaan digital memungkinkan mahasiswa mengakses ribuan koleksi literatur melalui perangkat digital, tanpa harus datang ke perpustakaan fisik.</p>',
                'img' => 'perpustakaan-digital.jpg',
                'link_akses' => 'https://perpustakaan.univ.ac.id/digital-library',
                'category' => 'Transformasi Digital',
                'admin' => 'Tim Digitalisasi',
                'tanggal' => Carbon::now()->subDays(3),
                'status' => 'terbit',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
