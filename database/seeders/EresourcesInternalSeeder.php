<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EresourcesInternal;

class EresourcesInternalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            [
                'nama' => 'Katalog Online',
                'url' => 'https://katalog.umy.ac.id',
            ],
            [
                'nama' => 'MyPustaka',
                'url' => 'https://mypustaka.umy.ac.id',
            ],
            [
                'nama' => 'Repository',
                'url' => 'https://repository.umy.ac.id',
            ],
            [
                'nama' => 'SejarahMu',
                'url' => 'https://sejarahmu.umy.ac.id',
            ],
            [
                'nama' => 'ETD',
                'url' => 'https://etd.umy.ac.id',
            ],
            [
                'nama' => 'Ebook UMY',
                'url' => 'https://ebook.umy.ac.id',
            ],
            [
                'nama' => 'Jurnal UMY',
                'url' => 'https://journal.umy.ac.id',
            ],
            [
                'nama' => 'Resources Guide',
                'url' => 'https://guide.umy.ac.id',
            ],
        ];

        foreach ($resources as $resource) {
            EresourcesInternal::create($resource);
        }
    }
}
