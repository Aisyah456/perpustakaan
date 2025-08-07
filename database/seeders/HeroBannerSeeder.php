<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroBanner;

class HeroBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroBanner::create([
            'title' => 'Akses Referensi Digital',
            'subtitle' => 'Sesuai Program Studi',
            'description' => 'Temukan koleksi referensi digital terlengkap yang disesuaikan dengan kebutuhan program studi Anda',
            'button_text' => 'AKSES REFERENSI',
            'button_url' => '/referensi',
            'background_image' => 'lib/img/banner/slider-03.jpg', // sesuaikan path gambar
        ]);
    }
}
