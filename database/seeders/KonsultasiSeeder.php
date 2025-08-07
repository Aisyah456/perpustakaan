<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KonsultasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konsultasis')->insert([
            [
                'nama' => 'Ahmad Fadli',
                'nim_nidn' => '342020101',
                'email' => 'ahmad.fadli@example.com',
                'topik_konsultasi' => 'Permasalahan Akses e-Journal',
                'pesan' => 'Saya tidak bisa mengakses jurnal dari ScienceDirect, apakah ada solusi?',
                'status' => 'pending',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'nama' => 'Dewi Lestari',
                'nim_nidn' => '342020202',
                'email' => 'dewi.lestari@example.com',
                'topik_konsultasi' => 'Panduan Penulisan Sitasi',
                'pesan' => 'Saya butuh konsultasi tentang penulisan sitasi APA untuk tugas akhir.',
                'status' => 'diproses',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
        ]);
    }
}
