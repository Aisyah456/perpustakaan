<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'faculty_id' => 1,
                'kode' => 'TI',
                'nama_prodi' => 'Teknik Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 1,
                'kode' => 'SI',
                'nama_prodi' => 'Sistem Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 2,
                'kode' => 'AK',
                'nama_prodi' => 'Akuntansi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 2,
                'kode' => 'MN',
                'nama_prodi' => 'Manajemen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('programs')->insert($programs);
    }
}
