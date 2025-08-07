<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LibraryOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LibraryOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Level 1
        $upt = LibraryOrganization::create([
            'name' => 'Dr. Andi Subekti',
            'position' => 'Kepala UPT Perpustakaan',
            'level' => 1,
        ]);

        // Level 2
        $kepalaPerpus = LibraryOrganization::create([
            'name' => 'Sri Rahayu, S.Sos',
            'position' => 'Kepala Perpustakaan',
            'parent_id' => $upt->id,
            'level' => 2,
        ]);

        // Level 3
        $bidangLayanan = LibraryOrganization::create([
            'name' => 'M. Taufik',
            'position' => 'Kepala Bidang Layanan',
            'parent_id' => $kepalaPerpus->id,
            'level' => 3,
        ]);

        $bidangKoleksi = LibraryOrganization::create([
            'name' => 'Nur Aini',
            'position' => 'Kepala Bidang Koleksi & Katalog',
            'parent_id' => $kepalaPerpus->id,
            'level' => 3,
        ]);

        // Level 4
        LibraryOrganization::insert([
            [
                'name' => 'Dedi Kurniawan',
                'position' => 'Staf IT',
                'parent_id' => $bidangLayanan->id,
                'level' => 4,
            ],
            [
                'name' => 'Dewi Kartika',
                'position' => 'Staf Referensi',
                'parent_id' => $bidangLayanan->id,
                'level' => 4,
            ],
            [
                'name' => 'Lina Wahyuni',
                'position' => 'Staf Katalogisasi',
                'parent_id' => $bidangKoleksi->id,
                'level' => 4,
            ],
            [
                'name' => 'Riko Pranata',
                'position' => 'Staf Sirkulasi',
                'parent_id' => $bidangKoleksi->id,
                'level' => 4,
            ],
        ]);
    }
}
