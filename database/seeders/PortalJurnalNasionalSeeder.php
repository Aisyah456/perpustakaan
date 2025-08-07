<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortalJurnalNasional;

class PortalJurnalNasionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portals = [
            [
                'nama' => 'Sinta Kemendikbud',
                'url' => 'https://sinta.kemdikbud.go.id',
                'deskripsi' => 'Science and Technology Index (SINTA) adalah portal yang mengintegrasikan informasi tentang aktivitas riset di Indonesia',
                'is_active' => true,
            ],
            [
                'nama' => 'Onesearch.id',
                'url' => 'https://onesearch.id',
                'deskripsi' => 'Portal pencarian terpadu untuk sumber daya informasi ilmiah Indonesia',
                'is_active' => true,
            ],
            [
                'nama' => 'Portal Garuda',
                'url' => 'https://garuda.kemdikbud.go.id',
                'deskripsi' => 'Garba Rujukan Digital (GARUDA) adalah portal rujukan digital Indonesia',
                'is_active' => true,
            ],
            [
                'nama' => 'Moraref',
                'url' => 'https://moraref.kemenag.go.id',
                'deskripsi' => 'Portal referensi digital Kementerian Agama Republik Indonesia',
                'is_active' => true,
            ],
            [
                'nama' => 'Neliti.Com',
                'url' => 'https://www.neliti.com',
                'deskripsi' => 'Platform penelitian dan publikasi ilmiah Indonesia',
                'is_active' => true,
            ],
        ];

        foreach ($portals as $portal) {
            PortalJurnalNasional::create($portal);
        }
    }
}
