<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ArticelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = [
            [
                'judul'         => 'Mengenal Perpustakaan Digital',
                'slug'          => Str::slug('Mengenal Perpustakaan Digital'),
                'kutipan'       => 'Pengantar singkat tentang era perpustakaan digital.',
                'isi'           => 'Artikel ini menjelaskan bagaimana perpustakaan digital mengubah cara kita mengakses informasi secara global.',
                'gambar'        => 'digital.jpg',
                'link_akses'    => 'https://perpustakaan.umht.ac.id/digital',
                'kategori_id'   => 1,
                'user_id'       => 1,
                'tanggal_publish' => Carbon::now(),
                'status'        => 'terbit',
            ],
            [
                'judul'         => 'Strategi Efektif Meningkatkan Minat Baca Mahasiswa',
                'slug'          => Str::slug('Strategi Efektif Meningkatkan Minat Baca Mahasiswa'),
                'kutipan'       => 'Beberapa strategi kampus dalam meningkatkan budaya literasi.',
                'isi'           => 'Universitas dapat menerapkan kegiatan literasi dan pengenalan pustaka sejak awal perkuliahan.',
                'gambar'        => 'minat-baca.jpg',
                'link_akses'    => null,
                'kategori_id'   => 2,
                'user_id'       => 1,
                'tanggal_publish' => Carbon::now()->subDays(1),
                'status'        => 'terbit',
            ],
            [
                'judul'         => 'Workshop Penulisan Karya Ilmiah 2025',
                'slug'          => Str::slug('Workshop Penulisan Karya Ilmiah 2025'),
                'kutipan'       => 'Agenda kegiatan pelatihan karya ilmiah untuk mahasiswa tingkat akhir.',
                'isi'           => 'Pelatihan akan diadakan secara luring di ruang seminar Gedung A lantai 3 pada tanggal 25 Agustus 2025.',
                'gambar'        => 'workshop-ilmiah.jpg',
                'link_akses'    => 'https://umht.ac.id/agenda/workshop-ilmiah',
                'kategori_id'   => 3,
                'user_id'       => 2,
                'tanggal_publish' => Carbon::now()->addDays(5),
                'status'        => 'terbit',
            ],
            [
                'judul'         => 'Koleksi Terbaru: Buku Teknologi Informasi',
                'slug'          => Str::slug('Koleksi Terbaru: Buku Teknologi Informasi'),
                'kutipan'       => 'Buku-buku baru tentang AI, Data Science dan Keamanan Siber tersedia.',
                'isi'           => 'Mahasiswa dapat meminjam koleksi terbaru ini mulai minggu depan di lantai 2 ruang referensi.',
                'gambar'        => 'koleksi-it.jpg',
                'link_akses'    => null,
                'kategori_id'   => 4,
                'user_id'       => 1,
                'tanggal_publish' => Carbon::now()->subDays(2),
                'status'        => 'terbit',
            ],
            [
                'judul'         => 'Tips Membuat Kutipan dan Daftar Pustaka',
                'slug'          => Str::slug('Tips Membuat Kutipan dan Daftar Pustaka'),
                'kutipan'       => 'Panduan singkat membuat kutipan yang benar dalam karya ilmiah.',
                'isi'           => 'Pahami cara penulisan kutipan langsung dan tidak langsung sesuai dengan gaya APA dan IEEE.',
                'gambar'        => 'kutipan.jpg',
                'link_akses'    => 'https://perpustakaan.umht.ac.id/kutipan-panduan',
                'kategori_id'   => 1,
                'user_id'       => 2,
                'tanggal_publish' => Carbon::now()->subDays(4),
                'status'        => 'terbit',
            ],
        ];

        foreach ($article as $article) {
            Article::create($article);
        }
    }
}
