<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('konsultasis', function (Blueprint $table) {
            // Tambahan field identitas
            $table->year('tahun_masuk')->nullable()->after('nim_nidn');
            $table->string('fakultas')->nullable()->after('tahun_masuk');
            $table->string('program_studi')->nullable()->after('fakultas');

            // Tambahan field layanan
            $table->string('no_hp')->nullable()->after('email');
            $table->dateTime('jadwal_konsultasi')->nullable()->after('pesan');
            $table->string('dosen_pembimbing')->nullable()->after('jadwal_konsultasi');
            $table->text('catatan_admin')->nullable()->after('status');

            // Update enum status → tambahkan opsi ditolak
            $table->enum('status', ['pending', 'diproses', 'selesai', 'ditolak'])
                ->default('pending')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsultasis', function (Blueprint $table) {
            $table->dropColumn([
                'tahun_masuk',
                'fakultas',
                'program_studi',
                'no_hp',
                'jadwal_konsultasi',
                'dosen_pembimbing',
                'catatan_admin'
            ]);

            // Balik enum status ke semula
            $table->enum('status', ['pending', 'diproses', 'selesai'])
                ->default('pending')
                ->change();
        });
    }
};
