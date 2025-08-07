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
            'name' => 'PERPUSNAS',
            'link' => 'https://www.perpusnas.go.id/',
            'logo' => 'LOGO-PERPUSNAS.png',
            'hover_logo' => 'LOGO-PERPUSNAS.png',
            'background_image' => 'LOGO-PERPUSNAS.png',
        ]);
        Partner::create([
            'name' => 'FPPTI',
            'link' => 'https://fppti.or.id/v2/',
            'logo' => 'logo-fppti.png',
            'hover_logo' => 'logo-fppti.png',
            'background_image' => 'logo-fppti.png',
        ]);
        Partner::create([
            'name' => 'ONESEARCH',
            'link' => 'https://onesearch.id/',
            'logo' => 'images (1).png',
            'hover_logo' => 'images (1).png',
            'background_image' => 'images (1).png',
        ]);
        Partner::create([
            'name' => 'KUBUKU',
            'link' => 'https://www.kubuku.co.id/',
            'logo' => '474713094_620103537064486_6135352026484951659_n.jpg',
            'hover_logo' => '474713094_620103537064486_6135352026484951659_n.jpg',
            'background_image' => '474713094_620103537064486_6135352026484951659_n.jpg',
        ]);
        Partner::create([
            'name' => 'GRAMEDIA',
            'link' => 'https://www.gramedia.com/?srsltid=AfmBOoreLA6MgSOfnUA-T8PqUIrEZskTeah_XgoowQQMwEDYL1hZD125',
            'logo' => 'images.png',
            'hover_logo' => 'images.png',
            'background_image' => 'images.png',
        ]);
        Partner::create([
            'name' => 'GALE',
            'link' => 'https://www.gale.com/',
            'logo' => 'logo-gale.png',
            'hover_logo' => 'logo-gale.png',
            'background_image' => 'logo-gale.png',
        ]);
    }
}
