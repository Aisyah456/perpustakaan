<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Dr. Ahmad Syafii, M.Pd', 'jabatan' => 'Kepala Perpustakaan', 'kategori' => 'kepala'],
            ['nama' => 'Ibu Sri Wahyuni, S.IP', 'jabatan' => 'Kepala Layanan Referensi', 'kategori' => 'sub'],
            ['nama' => 'Bapak Dedi Kurniawan, S.Hum', 'jabatan' => 'Kepala Layanan Sirkulasi', 'kategori' => 'sub'],
            ['nama' => 'Nurhaliza, A.Md', 'jabatan' => 'Bagian Administrasi', 'kategori' => 'anggota'],
            ['nama' => 'Andri Firmansyah', 'jabatan' => 'Teknisi & Digitalisasi', 'kategori' => 'anggota'],
            ['nama' => 'Fatmawati, S.IIP', 'jabatan' => 'Petugas Layanan Pengguna', 'kategori' => 'anggota'],
        ];
    }
}
