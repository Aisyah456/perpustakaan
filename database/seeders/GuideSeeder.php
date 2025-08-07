<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guides')->insert([
            ['title' => 'Keputusan Rektor UMY No. 217/SK-UMY/IXI/2017 tentang Pedoman Penulisan Tugas Akhir Mahasiswa UMY', 'category' => 'Umum', 'file_path' => null, 'is_active' => true],
            ['title' => 'Prosedur Bebas Pustaka Mandiri (Keperluan Yudisium/Wisuda)', 'category' => 'Sirkulasi', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Bebas Pustaka Keperluan Mengundurkan Diri atau Cuti Kuliah', 'category' => 'Sirkulasi', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Cek Turnitin Mandiri (Khusus untuk karya ilmiah yang tidak membutuhkan pendadaran)', 'category' => 'Plagiarisme', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Cek Turnitin untuk Keperluan Pendadaran', 'category' => 'Plagiarisme', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Pemanfaatan Aplikasi VosViewer', 'category' => 'Referensi', 'file_path' => null, 'is_active' => true],
            ['title' => 'Akses Springer, Scopus, Emerald dari Luar Kampus', 'category' => 'Digital', 'file_path' => null, 'is_active' => true],
            ['title' => 'Diseminasi Informasi', 'category' => 'Umum', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Akses MYPustaka', 'category' => 'Digital', 'file_path' => null, 'is_active' => true],
            ['title' => 'Pedoman Kepenulisan Tugas Akhir Mahasiswa UMY', 'category' => 'Umum', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Pemanfaatan Mendeley', 'category' => 'Referensi', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Perpanjang Pinjaman Perpustakaan', 'category' => 'Sirkulasi', 'file_path' => null, 'is_active' => true],
            ['title' => 'Plagiarisme: Teori dan Praktik Bebas dari Plagiasi', 'category' => 'Plagiarisme', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Pemanfaatan Aplikasi Zotero', 'category' => 'Referensi', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Tool AI untuk Cek Typo', 'category' => 'AI Tools', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Tool AI untuk Literatur Review', 'category' => 'AI Tools', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Tool AI untuk Cek Qurtil Jurnal', 'category' => 'AI Tools', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Tools AI untuk Mencari Rekomendasi Judul yang Menarik', 'category' => 'AI Tools', 'file_path' => null, 'is_active' => true],
            ['title' => 'Panduan Tool AI untuk Membuat Slide Presentasi', 'category' => 'AI Tools', 'file_path' => null, 'is_active' => true],
        ]);
    }
}
