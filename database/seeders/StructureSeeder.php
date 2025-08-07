<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('structures')->insert([
            ['id' => 1, 'name' => 'Dr. Ahmad Yani', 'position' => 'Kepala UPT Perpustakaan', 'parent_id' => null],
            ['id' => 2, 'name' => 'Siti Lestari', 'position' => 'Kabid Layanan & Referensi', 'parent_id' => 1],
            ['id' => 3, 'name' => 'Budi Santoso', 'position' => 'Kabid Pengembangan Koleksi', 'parent_id' => 1],
            ['id' => 4, 'name' => 'Tina Nurhaliza', 'position' => 'Staff Layanan Sirkulasi', 'parent_id' => 2],
            ['id' => 5, 'name' => 'Rino Saputra', 'position' => 'Staff Katalogisasi', 'parent_id' => 3],
        ]);
    }
}
