<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerpustakaanVisi;
use App\Models\PerpustakaanVisiPoin;
use App\Models\PerpustakaanMisi;
use App\Models\PerpustakaanMisiPoin;

class PerpustakaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Visi
        $visi = PerpustakaanVisi::create([
            'deskripsi' => 'Menjadi Perpustakaan Perguruan Tinggi yang Unggul dalam Layanan Informasi Kemuhammadiyahan, Al Islam, dan Ilmu Pengetahuan Berbasis Teknologi Informasi Komunikasi melalui Kerjasama pada Tahun 2032.',
            'tahun_target' => 2032,
            'is_active' => true,
        ]);

        // Create Visi Poin
        $visiPoin = [
            [
                'visi_id' => $visi->id,
                'nomor' => 1,
                'deskripsi' => 'Menyediakan, mengolah, menyimpan, melestarikan, dan memberdayakan sumber informasi, karya akademik, dan karya ilmiah sivitas akademika dan peminat lain',
                'is_active' => true,
                'urutan' => 1,
            ],
            [
                'visi_id' => $visi->id,
                'nomor' => 2,
                'deskripsi' => 'Menyediakan media, fasilitas, dan sarana prasarana sharing knowledge bagi sivitas akademika dan peminat lain',
                'is_active' => true,
                'urutan' => 2,
            ],
            [
                'visi_id' => $visi->id,
                'nomor' => 3,
                'deskripsi' => 'Mengumpulkan, mendokumentasikan, melestarikan, dan mensosialisasikan karya-karya Kemuhammadiyahan',
                'is_active' => true,
                'urutan' => 3,
            ],
            [
                'visi_id' => $visi->id,
                'nomor' => 4,
                'deskripsi' => 'Melakukan pembinaan perpustakaan PTMA se Indonesia dan perpustakaan Amal Usaha Muhammadiyah/AUM DIY.',
                'is_active' => true,
                'urutan' => 4,
            ],
            [
                'visi_id' => $visi->id,
                'nomor' => 5,
                'deskripsi' => 'Menunjang kegiatan pendidikan, penelitian, pengabdian pada masyarakat, dan kegiatan Al Islam dan Kemuhammadiyahan/AIK',
                'is_active' => true,
                'urutan' => 5,
            ],
        ];

        foreach ($visiPoin as $poin) {
            PerpustakaanVisiPoin::create($poin);
        }

        // Create Misi
        $misi = PerpustakaanMisi::create([
            'deskripsi' => 'Misi Perpustakaan Universitas Muhammadiyah Yogyakarta dalam mendukung Tri Dharma Perguruan Tinggi',
            'is_active' => true,
        ]);

        // Create Misi Poin
        $misiPoin = [
            [
                'misi_id' => $misi->id,
                'nomor' => 1,
                'deskripsi' => 'Mengembangkan koleksi perpustakaan yang berkualitas dan relevan dengan kebutuhan sivitas akademika',
                'is_active' => true,
                'urutan' => 1,
            ],
            [
                'misi_id' => $misi->id,
                'nomor' => 2,
                'deskripsi' => 'Memberikan layanan prima berbasis teknologi informasi',
                'is_active' => true,
                'urutan' => 2,
            ],
            [
                'misi_id' => $misi->id,
                'nomor' => 3,
                'deskripsi' => 'Mengembangkan kerjasama dengan perpustakaan perguruan tinggi lain dan institusi terkait',
                'is_active' => true,
                'urutan' => 3,
            ],
            [
                'misi_id' => $misi->id,
                'nomor' => 4,
                'deskripsi' => 'Meningkatkan kompetensi pustakawan dan tenaga perpustakaan',
                'is_active' => true,
                'urutan' => 4,
            ],
            [
                'misi_id' => $misi->id,
                'nomor' => 5,
                'deskripsi' => 'Mendokumentasikan dan melestarikan karya-karya Kemuhammadiyahan',
                'is_active' => true,
                'urutan' => 5,
            ],
        ];

        foreach ($misiPoin as $poin) {
            PerpustakaanMisiPoin::create($poin);
        }
    }
}
