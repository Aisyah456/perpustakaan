<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pustaka;
use Illuminate\Support\Carbon;

class PustakaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Ayu',
                'nim' => '342017001',
                'jurusan' => 'Teknik Informatika',
                'tanggal_permohonan' => Carbon::parse('2025-06-01'),
                'status' => 'pending',
            ],
            [
                'nama' => 'Dian',
                'nim' => '342017006',
                'jurusan' => 'Teknik Informatika',
                'tanggal_permohonan' => Carbon::parse('2025-06-10'),
                'status' => 'disetujui',
            ],
        ];

        foreach ($data as $item) {
            // Mencegah duplikasi NIM
            Pustaka::updateOrCreate(
                ['nim' => $item['nim']], // kunci unik
                $item
            );
        }
    }
}
