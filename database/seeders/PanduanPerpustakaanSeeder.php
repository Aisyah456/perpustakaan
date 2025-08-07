<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\PanduanPerpustakaan;

class PanduanPerpustakaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('panduan_perpustakaan')->insert([
            [
                'judul' => 'Prosedur Bebas Pustaka Mandiri (Keperluan Yudisium/Wisuda)',
                'deskripsi' => 'Panduan lengkap untuk proses bebas pustaka mandiri yang diperlukan untuk keperluan yudisium dan wisuda mahasiswa.',
                'link' => 'https://example.com/bebas-pustaka-mandiri',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Panduan Bebas Pustaka Keperluan Mengundurkan Diri atau Cuti Kuliah',
                'deskripsi' => 'Prosedur bebas pustaka untuk mahasiswa yang akan mengundurkan diri atau mengambil cuti kuliah.',
                'link' => 'https://example.com/bebas-pustaka-cuti',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Panduan Cek Turnitin Mandiri (Khusus untuk karya ilmiah yang tidak membutuhkan surat)',
                'deskripsi' => 'Cara menggunakan layanan Turnitin secara mandiri untuk pengecekan plagiarisme karya ilmiah.',
                'link' => 'https://example.com/turnitin-mandiri',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Panduan Cek Turitin untuk Keperluan Pendadaran',
                'deskripsi' => 'Prosedur pengecekan Turnitin khusus untuk keperluan pendadaran atau ujian akhir.',
                'link' => 'https://example.com/turnitin-pendadaran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Panduan Pemanfaatan Aplikasi VosViewer',
                'deskripsi' => 'Tutorial penggunaan aplikasi VosViewer untuk analisis bibliometrik dan visualisasi jaringan.',
                'link' => 'https://example.com/vosviewer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Akses Berbagai Sumber Elektronik Jurnal yang tersimpan',
                'deskripsi' => 'Cara mengakses koleksi jurnal elektronik dan sumber digital yang tersedia di perpustakaan.',
                'link' => 'https://example.com/jurnal-elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
