<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'title' => 'Selamat Datang di Perpustakaan UMHT',
                'subtitle' => 'Pusat Informasi dan Pengetahuan Mahasiswa',
                'description' => 'Perpustakaan Universitas Mohammad Husni Thamrin menyediakan berbagai koleksi buku, jurnal, e-book, dan layanan referensi untuk mendukung kegiatan akademik mahasiswa dan dosen.',
                'image' => 'banner1.jpg',
                'button_text' => 'Kunjungi Koleksi',
                'button_link' => url('/koleksi'),
            ],
            [
                'title' => 'Layanan Referensi dan Sirkulasi',
                'subtitle' => 'Bantuan dalam pencarian informasi',
                'description' => 'Kami menyediakan layanan referensi untuk membantu Anda menemukan sumber informasi yang relevan dengan kebutuhan akademik maupun penelitian Anda.',
                'image' => 'banner2.jpg',
                'button_text' => 'Ajukan Permintaan',
                'button_link' => url('/layanan/referensi'),
            ],
            [
                'title' => 'Akses E-Book dan Jurnal Online',
                'subtitle' => 'Kapan saja dan di mana saja',
                'description' => 'Nikmati kemudahan akses ke berbagai e-book dan jurnal ilmiah dari perangkat Anda. Login dengan akun kampus untuk mengakses koleksi digital kami.',
                'image' => 'banner3.jpg',
                'button_text' => 'Lihat E-Book',
                'button_link' => url('/koleksi/ebook'),
            ],
            [
                'title' => 'Layanan Bebas Pustaka',
                'subtitle' => 'Persyaratan akademik kelulusan',
                'description' => 'Mahasiswa tingkat akhir dapat mengajukan surat bebas pustaka secara online sebagai bagian dari proses kelulusan.',
                'image' => 'banner4.jpg',
                'button_text' => 'Ajukan Sekarang',
                'button_link' => url('/layanan/bebas-pustaka'),
            ],
        ]);
    }
}
