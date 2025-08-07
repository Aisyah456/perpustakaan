<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('research_tools')->insert([
            [
                'nama' => 'Google Scholar',
                'kategori' => 'Referensi',
                'deskripsi' => 'Layanan mesin telusur khusus literatur akademik dari Google.',
                'link' => 'https://scholar.google.com/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Mendeley',
                'kategori' => 'Sitasi',
                'deskripsi' => 'Alat manajemen referensi dan jejaring sosial akademik.',
                'link' => 'https://www.mendeley.com/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Turnitin',
                'kategori' => 'Plagiarisme',
                'deskripsi' => 'Platform deteksi plagiarisme untuk karya tulis ilmiah.',
                'link' => 'https://www.turnitin.com/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
