<?php

namespace Database\Seeders;

use App\Models\Vision;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vision::create([
            'content' => 'Menjadi pusat informasi modern berbasis teknologi yang mendukung pendidikan, penelitian, dan pengabdian kepada masyarakat.'
        ]);
    }
}
