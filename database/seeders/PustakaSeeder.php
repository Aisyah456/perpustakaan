<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PustakaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pustakas')->insert([
            [
                'name' => 'Ayu',
                'nim' => '342017001',
                'fakultas' => 'Sains Dan Teknologi',
                'jurusam' => 'Teknik Informatika',
                'thnakademik' => '2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dian',
                'nim' => '342017006',
                'fakultas' => 'Sains Dan Teknologi',
                'jurusam' => 'Teknik Informatika',
                'thnakademik' => '2020',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dian',
                'nim' => '342017006',
                'fakultas' => 'Sains Dan Teknologi',
                'jurusam' => 'Teknik Informatika',
                'thnakademik' => '2020',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
