<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReferenceAccess;

class ReferenceAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            // Fakultas Ekonomi
            ['fakultas' => 'Fakultas Ekonomi', 'prodi' => 'Manajemen', 'judul' => 'Referensi Manajemen', 'link' => 'https://manajemen-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Manajemen.'],
            ['fakultas' => 'Fakultas Ekonomi', 'prodi' => 'Akuntansi', 'judul' => 'Referensi Akuntansi', 'link' => 'https://akuntansi-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Akuntansi.'],
            ['fakultas' => 'Fakultas Ekonomi', 'prodi' => 'Ekonomi Pembangunan', 'judul' => 'Referensi Ekonomi Pembangunan', 'link' => 'https://ep-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Ekonomi Pembangunan.'],
            ['fakultas' => 'Fakultas Ekonomi', 'prodi' => 'Ekonomi Syariah', 'judul' => 'Referensi Ekonomi Syariah', 'link' => 'https://es-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Ekonomi Syariah.'],

            // Fakultas Ilmu Komputer
            ['fakultas' => 'Fakultas Ilmu Komputer', 'prodi' => 'Sistem Informasi', 'judul' => 'Referensi Sistem Informasi', 'link' => 'https://si-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Sistem Informasi.'],
            ['fakultas' => 'Fakultas Ilmu Komputer', 'prodi' => 'Informatika', 'judul' => 'Referensi Informatika', 'link' => 'https://informatika-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Informatika.'],
            ['fakultas' => 'Fakultas Ilmu Komputer', 'prodi' => 'Teknik Komputer', 'judul' => 'Referensi Teknik Komputer', 'link' => 'https://tk-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Teknik Komputer.'],
            ['fakultas' => 'Fakultas Ilmu Komputer', 'prodi' => 'Teknologi Informasi', 'judul' => 'Referensi Teknologi Informasi', 'link' => 'https://ti-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Teknologi Informasi.'],

            // Fakultas Kesehatan
            ['fakultas' => 'Fakultas Kesehatan', 'prodi' => 'Keperawatan', 'judul' => 'Referensi Keperawatan', 'link' => 'https://keperawatan-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Keperawatan.'],
            ['fakultas' => 'Fakultas Kesehatan', 'prodi' => 'Kebidanan', 'judul' => 'Referensi Kebidanan', 'link' => 'https://kebidanan-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Kebidanan.'],
            ['fakultas' => 'Fakultas Kesehatan', 'prodi' => 'Gizi', 'judul' => 'Referensi Gizi', 'link' => 'https://gizi-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Gizi.'],
            ['fakultas' => 'Fakultas Kesehatan', 'prodi' => 'Kesehatan Masyarakat', 'judul' => 'Referensi Kesehatan Masyarakat', 'link' => 'https://kesmas-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Kesehatan Masyarakat.'],

            // Fakultas Ilmu Sosial dan Politik
            ['fakultas' => 'Fakultas Ilmu Sosial dan Politik', 'prodi' => 'Ilmu Komunikasi', 'judul' => 'Referensi Ilmu Komunikasi', 'link' => 'https://ikom-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Ilmu Komunikasi.'],
            ['fakultas' => 'Fakultas Ilmu Sosial dan Politik', 'prodi' => 'Administrasi Publik', 'judul' => 'Referensi Administrasi Publik', 'link' => 'https://adpub-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Administrasi Publik.'],
            ['fakultas' => 'Fakultas Ilmu Sosial dan Politik', 'prodi' => 'Hubungan Internasional', 'judul' => 'Referensi Hubungan Internasional', 'link' => 'https://hi-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi HI.'],
            ['fakultas' => 'Fakultas Ilmu Sosial dan Politik', 'prodi' => 'Sosiologi', 'judul' => 'Referensi Sosiologi', 'link' => 'https://sosiologi-ref.umht.ac.id', 'deskripsi' => 'Referensi untuk prodi Sosiologi.'],

        ];

        foreach ($data as $item) {
            ReferenceAccess::create($item);
        }
    }
}
