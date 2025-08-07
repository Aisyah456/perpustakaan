<?php

namespace Database\Seeders;

use App\Models\LibraryHistory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LibraryHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $histories = [
            ['year' => 1998, 'title' => 'Pendirian Awal', 'description' => 'Perpustakaan didirikan bersamaan dengan berdirinya universitas sebagai pusat informasi dan pembelajaran.', 'icon' => 'building'],
            ['year' => 2002, 'title' => 'Pengembangan Koleksi', 'description' => 'Mulai mengembangkan koleksi buku sistematis fokus ekonomi, hukum, dan sosial.', 'icon' => 'book'],
            ['year' => 2008, 'title' => 'Era Digital', 'description' => 'Implementasi sistem digital dan langganan jurnal elektronik.', 'icon' => 'computer'],
            ['year' => 2012, 'title' => 'Modernisasi Fasilitas', 'description' => 'Renovasi besar-besaran, ruang AC, area baca nyaman, dan akses internet.', 'icon' => 'users'],
            ['year' => 2018, 'title' => 'Integrasi Teknologi', 'description' => 'Peluncuran sistem terintegrasi dan layanan Turnitin.', 'icon' => 'globe'],
            ['year' => 2023, 'title' => 'Perpustakaan Modern', 'description' => 'Transformasi jadi perpustakaan hybrid digital dan fisik.', 'icon' => 'calendar'],
        ];

        foreach ($histories as $item) {
            LibraryHistory::create($item);
        }
    }
}
