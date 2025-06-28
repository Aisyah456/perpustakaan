<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'name' => 'Partner A',
            'link' => '#!',
            'logo' => 'img/clients/01.png',
            'hover_logo' => 'img/clients/01-hover.png',
            'background_image' => 'img/clients/partners-img-01.jpg',
        ]);
    }
}
