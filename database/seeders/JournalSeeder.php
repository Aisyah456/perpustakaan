<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Journal;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $journals = [
            [
                'name' => 'ProQuest Central',
                'slug' => 'proquest-central',
                'logo_url' => '/images/proquest-logo.png',
                'background_color' => '#2d7d7d',
                'description' => 'Dilanggan oleh UMY',
                'access_url' => 'https://proquest.com',
                'sort_order' => 1
            ],
            [
                'name' => 'Scopus',
                'slug' => 'scopus',
                'logo_url' => '/images/scopus-logo.png',
                'background_color' => '#ff6b35',
                'description' => 'Dilanggan oleh UMY',
                'access_url' => 'https://scopus.com',
                'sort_order' => 2
            ],
            [
                'name' => 'SpringerLink',
                'slug' => 'springerlink',
                'logo_url' => '/images/springer-logo.png',
                'background_color' => '#ffffff',
                'description' => 'Dilanggan oleh UMY',
                'access_url' => 'https://link.springer.com',
                'sort_order' => 3
            ],
            [
                'name' => 'Emerald Insight',
                'slug' => 'emerald-insight',
                'logo_url' => '/images/emerald-logo.png',
                'background_color' => '#00a651',
                'description' => 'Dilanggan oleh UMY',
                'access_url' => 'https://emerald.com',
                'sort_order' => 4
            ],
            [
                'name' => 'E-Resources Perpusnas',
                'slug' => 'e-resources-perpusnas',
                'logo_url' => '/images/perpusnas-logo.png',
                'background_color' => '#ffffff',
                'description' => 'Perpustakaan Nasional Republik Indonesia',
                'access_url' => 'https://e-resources.perpusnas.go.id',
                'sort_order' => 5
            ]
        ];

        foreach ($journals as $journal) {
            Journal::create($journal);
        }
    }
}
