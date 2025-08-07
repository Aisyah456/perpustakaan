<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $missions = [
            'Menyediakan koleksi cetak dan digital yang lengkap dan mutakhir.',
            'Mengembangkan layanan informasi berbasis teknologi informasi.',
            'Mendukung program pendidikan, penelitian, dan pengabdian.',
            'Meningkatkan literasi informasi civitas akademika.',
        ];

        foreach ($missions as $mission) {
            Mission::create(['content' => $mission]);
        }
    }
}
