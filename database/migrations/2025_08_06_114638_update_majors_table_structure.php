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
        Schema::table('majors', function (Blueprint $table) {
            // Rename kolom name ke nama_prodi
            $table->renameColumn('name', 'nama_prodi');

            // Tambahkan foreign key constraint ke faculty_id
            $table->foreign('faculty_id')
                ->references('id')
                ->on('faculties')
                ->onDelete('cascade');

            // Jadikan kode unik
            $table->unique('kode');
        });
    }

    public function down(): void
    {
        Schema::table('majors', function (Blueprint $table) {
            // Rollback perubahan
            $table->renameColumn('nama_prodi', 'name');
            $table->dropForeign(['faculty_id']);
            $table->dropUnique(['kode']);
        });
    }
};
