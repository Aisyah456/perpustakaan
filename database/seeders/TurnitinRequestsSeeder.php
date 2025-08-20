<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnitinRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('turnitin_requests')->insert([
            [
                'nama'             => 'Andi Wijaya',
                'nim_nidn'         => '123456789',
                'email'            => 'andi@example.com',
                'fakultas_prodi'   => 'Fakultas Teknik Informatika',
                'judul_naskah'     => 'Analisis Sistem Informasi Perpustakaan',
                'jenis_dokumen'    => 'Skripsi',
                'file'             => 'turnitin_files/skripsi_andi.pdf',
                'catatan_pengguna' => 'Mohon dicek segera, butuh untuk sidang.',
                'status'           => 'pending',
                'hasil_turnitin'   => null,
                'catatan_admin'    => null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'nama'             => 'Budi Santoso',
                'nim_nidn'         => '987654321',
                'email'            => 'budi@example.com',
                'fakultas_prodi'   => 'Fakultas Ekonomi dan Bisnis',
                'judul_naskah'     => 'Strategi Pemasaran Digital UMKM',
                'jenis_dokumen'    => 'Artikel',
                'file'             => 'turnitin_files/artikel_budi.docx',
                'catatan_pengguna' => 'Artikel untuk jurnal nasional.',
                'status'           => 'diproses',
                'hasil_turnitin'   => '23%',
                'catatan_admin'    => 'Sudah diperiksa, tingkat kesamaan rendah.',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
