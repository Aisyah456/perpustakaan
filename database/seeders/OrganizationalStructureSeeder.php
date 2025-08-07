<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationalStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizational_structures')->insert([
            [
                'position' => 'Kepala Perpustakaan',
                'name' => 'Dr. Ahmad Syafii, M.Pd',
                'level' => 1,
            ],
            [
                'position' => 'Kepala Layanan Referensi',
                'name' => 'Ibu Sri Wahyuni, S.IP',
                'level' => 2,
            ],
            [
                'position' => 'Kepala Layanan Sirkulasi',
                'name' => 'Bapak Dedi Kurniawan, S.Hum',
                'level' => 2,
            ],
            [
                'position' => 'Bagian Administrasi',
                'name' => 'Nurhaliza, A.Md',
                'level' => 3,
            ],
            [
                'position' => 'Teknisi & Digitalisasi',
                'name' => 'Andri Firmansyah',
                'level' => 3,
            ],
            [
                'position' => 'Petugas Layanan Pengguna',
                'name' => 'Fatmawati, S.IIP',
                'level' => 3,
            ],
        ]);
    }
}
