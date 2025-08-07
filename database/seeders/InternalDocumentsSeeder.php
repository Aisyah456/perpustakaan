<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InternalDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokumen = [
            [
                'judul' => 'Pedoman Analisis Kinerja Perpustakaan',
                'kategori' => 'Pedoman',
                'deskripsi' => 'Dokumen ini berisi panduan untuk mengevaluasi dan menganalisis kinerja operasional serta layanan di lingkungan perpustakaan.',
                'file' => 'dokumen-internal/pedoman analisis kinerja perpustakaan.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Persyaratan Pengurusan Bebas Pustaka',
                'kategori' => 'Syarat',
                'deskripsi' => 'Merinci syarat dan ketentuan yang harus dipenuhi mahasiswa untuk mengurus surat bebas pustaka sebelum proses kelulusan.',
                'file' => 'dokumen-internal/PERSYARATAN PENGURUSAN BEBAS PUSTAKA 001.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Cek Plagiarisme (Revisi)',
                'kategori' => 'SOP',
                'deskripsi' => 'Prosedur standar terbaru untuk pengecekan plagiarisme pada karya tulis akademik menggunakan perangkat lunak tertentu seperti Turnitin.',
                'file' => 'dokumen-internal/SOP Cek Plagiat - Revisi.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Evaluasi Koleksi',
                'kategori' => 'SOP',
                'deskripsi' => 'Standar operasional untuk menilai relevansi, kualitas, dan kelayakan koleksi buku atau sumber lainnya di perpustakaan.',
                'file' => 'dokumen-internal/SOP EVALUASI KOLEKSI 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Katalogisasi Buku',
                'kategori' => 'SOP',
                'deskripsi' => 'Panduan teknis mengenai proses pengelompokan dan pencatatan buku agar dapat ditemukan melalui sistem katalog perpustakaan.',
                'file' => 'dokumen-internal/SOP KATALOG BUKU 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Keanggotaan Perpustakaan',
                'kategori' => 'SOP',
                'deskripsi' => 'Menjelaskan prosedur pendaftaran, perpanjangan, serta hak dan kewajiban anggota perpustakaan.',
                'file' => 'dokumen-internal/SOP KEANGGOTAAN 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Layanan Pemustaka',
                'kategori' => 'SOP',
                'deskripsi' => 'Prosedur standar dalam memberikan layanan kepada pengguna perpustakaan, termasuk peminjaman, referensi, dan informasi.',
                'file' => 'dokumen-internal/SOP LAYANAN PEMBACA 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Operasional OOD (Office of Documentation)',
                'kategori' => 'SOP',
                'deskripsi' => 'Standar operasional untuk pengelolaan dokumen dan arsip di unit Office of Documentation (OOD) perpustakaan.',
                'file' => 'dokumen-internal/SOP OOD 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Pembelian Buku',
                'kategori' => 'SOP',
                'deskripsi' => 'Panduan dalam proses pengadaan atau pembelian buku untuk koleksi perpustakaan, mulai dari pengusulan hingga pelaporan.',
                'file' => 'dokumen-internal/SOP PEMBELIAN BUKU 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Pembelian Buku (Versi Alternatif)',
                'kategori' => 'SOP',
                'deskripsi' => 'Versi lainnya dari SOP pembelian buku yang memuat prosedur dan alur kerja unit pengadaan koleksi.',
                'file' => 'dokumen-internal/SOP Pembelian Buku.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Peminjaman Buku',
                'kategori' => 'SOP',
                'deskripsi' => 'Prosedur resmi peminjaman koleksi pustaka oleh anggota, termasuk batas waktu, jumlah buku, dan sanksi keterlambatan.',
                'file' => 'dokumen-internal/SOP PEMINJAMAN 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Pengembalian Buku',
                'kategori' => 'SOP',
                'deskripsi' => 'Petunjuk teknis dalam proses pengembalian buku ke perpustakaan, termasuk prosedur denda dan kondisi buku.',
                'file' => 'dokumen-internal/SOP PENGEMBALIAN BUKU 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Pengkatalogan Buku',
                'kategori' => 'SOP',
                'deskripsi' => 'Proses teknis pencatatan dan pengelompokan buku berdasarkan sistem klasifikasi yang digunakan perpustakaan.',
                'file' => 'dokumen-internal/SOP PENGKATALOGAN BUKU 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Perpanjangan Buku',
                'kategori' => 'SOP',
                'deskripsi' => 'Aturan dan langkah-langkah perpanjangan masa pinjam buku perpustakaan oleh anggota.',
                'file' => 'dokumen-internal/SOP PERPANJANGAN BUKU 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Prosedur Bebas Pustaka',
                'kategori' => 'SOP',
                'deskripsi' => 'Panduan lengkap mengenai proses verifikasi dan penerbitan surat bebas pustaka bagi mahasiswa yang akan lulus.',
                'file' => 'dokumen-internal/SOP Prosedur Bebas Pustaka.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Prosedur Cek Plagiasi Mahasiswa',
                'kategori' => 'SOP',
                'deskripsi' => 'Prosedur wajib untuk memeriksa tingkat kemiripan karya ilmiah mahasiswa sebagai syarat akademik tertentu.',
                'file' => 'dokumen-internal/SOP Prosedur Cek Plagiasi Mahasiswa.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Unggah Karya Ilmiah Mahasiswa (Versi 1)',
                'kategori' => 'SOP',
                'deskripsi' => 'Panduan teknis pertama untuk mahasiswa dalam mengunggah karya ilmiah ke sistem repositori atau perpustakaan digital.',
                'file' => 'dokumen-internal/SOP Prosedur Unggah Karya Ilmiah Mahasiswa (1).pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Unggah Karya Ilmiah Mahasiswa',
                'kategori' => 'SOP',
                'deskripsi' => 'Prosedur resmi pengunggahan karya ilmiah mahasiswa sebagai bagian dari persyaratan akademik atau kelulusan.',
                'file' => 'dokumen-internal/SOP Prosedur Unggah Karya Ilmiah Mahasiswa.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Sumbangan Buku',
                'kategori' => 'SOP',
                'deskripsi' => 'Prosedur pemberian dan penerimaan buku dari individu atau instansi sebagai bentuk donasi untuk menambah koleksi perpustakaan.',
                'file' => 'dokumen-internal/SOP SUMBANGAN BUKU 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'SOP Penanganan Gangguan Perangkat Komputer',
                'kategori' => 'SOP',
                'deskripsi' => 'Panduan untuk menangani masalah teknis pada komputer atau perangkat IT di lingkungan perpustakaan.',
                'file' => 'dokumen-internal/SOP TROUBLE PER KOMP 001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('internal_documents')->insert($dokumen);
    }
}
