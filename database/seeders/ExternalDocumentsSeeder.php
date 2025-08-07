<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ExternalDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('external_documents')->insert([
            [
                'judul' => 'Repository Nasional Ristek',
                'kategori' => 'Publikasi',
                'deskripsi' => 'Akses berbagai publikasi nasional melalui Ristekdikti.',
                'link' => 'https://repository.ristek.go.id/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Jurnal Ilmiah Indonesia',
                'kategori' => 'Jurnal',
                'deskripsi' => 'Kumpulan jurnal-jurnal ilmiah nasional.',
                'link' => 'https://jurnalindonesia.org',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
