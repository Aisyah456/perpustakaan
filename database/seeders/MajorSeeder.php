<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $majors = [
            [
                'faculty_kode' => '001',
                'name' => 'S1 Keperawatan',
                'code' => 'S1-KEP',
                'lecture' => 'budi 1',
            ],
            [
                'faculty_kode' => '002',
                'name' => 'S1 Sistem Informasi',
                'code' => 'S1-SI',
                'lecture' => 'budi 2',
            ],
            [
                'faculty_kode' => '003',
                'name' => 'S1 Manajemen',
                'code' => 'S1-MAN',
                'lecture' => 'budi 3',
            ],
            [
                'faculty_kode' => '004',
                'name' => 'S1 Bahasa Inggris',
                'code' => 'S1-NING',
                'lecture' => 'budi 4',
            ],
        ];

        foreach ($majors as $major) {
            $faculty = Faculty::where('kode', $major['faculty_kode'])->first();

            if ($faculty) {
                Major::create([
                    'faculty_id' => $faculty->id,
                    'name' => $major['name'],
                    'code' => $major['code'],
                    'lecture' => $major['lecture'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
