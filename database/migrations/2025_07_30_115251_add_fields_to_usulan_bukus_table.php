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
        Schema::table('usulan_bukus', function (Blueprint $table) {
            $table->string('nim')->after('nama_pengusul');
            $table->string('fakultas')->after('nim');
            $table->string('program_studi')->after('fakultas');
            $table->year('tahun_terbit')->after('penerbit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usulan_bukus', function (Blueprint $table) {
            $table->dropColumn(['nim', 'fakultas', 'program_studi', 'tahun_terbit']);
        });
    }
};
