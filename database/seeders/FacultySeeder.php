<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        $faculties = [
            ['nama_fakultas' => 'Fakultas Kesehatan', 'kode' => '001'],
            ['nama_fakultas' => 'Fakultas Komputer', 'kode' => '002'],
            ['nama_fakultas' => 'Fakultas Ekonomi dan bisnis', 'kode' => '003'],
            ['nama_fakultas' => 'Fakultas Keguruan dan Ilmu Pendidikan', 'kode' => '004'],
        ];

        foreach ($faculties as $fakultas) {
            Faculty::create([
                ...$fakultas,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
