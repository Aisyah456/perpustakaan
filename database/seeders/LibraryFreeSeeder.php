<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Major;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class LibraryFreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('library_free_teble')->insert([
            [
                'nama' => 'Ahmad Fauzi',
                'nim' => '2021010001',
                'faculty_id' => 1, // ID fakultas yang ada di tabel faculties
                'major_id' => 1,   // ID prodi yang ada di tabel majors
                'no_hp' => '081234567890',
                'email' => 'ahmad.fauzi@example.com',
                'jenjang' => 'S1',
                'keperluan' => 'Wisuda',
                'tahun_masuk' => '2021',
                'tahun_lulus' => '2025',
                'file_karya_ilmiah' => 'uploads/karya_ilmiah/skripsi_ahmad.pdf',
                'scan_ktm' => 'uploads/ktm/ktm_ahmad.jpg',
                'bukti_upload' => 'uploads/bukti/bukti_ahmad.jpg',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
