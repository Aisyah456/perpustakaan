<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EresourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Eresource::insert([
            [
                'title' => 'MyPustaka UMHT',
                'description' => 'MyPustaka merupakan portal pencarian terintegrasi, yang menggabungkan berbagai resources dan platform.',
                'image' => 'images/mypustaka.jpg',
                'link' => 'https://mypustaka.umht.ac.id',
                'button_label' => 'MyPustaka UMHT',
            ],
            [
                'title' => 'Jurnal & eBook',
                'description' => 'Berbagai resources yang diintegrasikan dalam MyPustaka yaitu katalog, jurnal, ebook, repository dan lainnya.',
                'image' => 'images/ebook.jpg',
                'link' => 'https://journal.umht.ac.id',
                'button_label' => 'Jurnal UMHT',
            ],
            [
                'title' => 'Repository',
                'description' => 'Akses tugas akhir, tesis, dan disertasi mahasiswa UMHT secara digital.',
                'image' => 'images/repository.jpg',
                'link' => 'https://repository.umht.ac.id',
                'button_label' => 'Repository',
            ],
            [
                'title' => 'ETD',
                'description' => 'Electronic Theses and Dissertations (ETD) UMHT.',
                'image' => 'images/etd.jpg',
                'link' => 'https://etd.umht.ac.id',
                'button_label' => 'ETD',
            ],
        ]);
    }
}
