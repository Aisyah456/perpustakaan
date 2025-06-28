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
        Schema::create('plagiats', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('nim');
            $table->string('nama');
            $table->string('id_fakultas');
            $table->string('id_prodi');
            $table->string('kat_karya');
            $table->string('kat_mhs');
            $table->string('tujuan');
            $table->string('jdl_karya_1');
            $table->string('nm_pembimbing1');
            $table->string('email_pembimbing1');
            $table->string('nm_pembimbing2');
            $table->string('email_pembimbing2');
            $table->string('upload1');
            $table->string('jdl_karya_ilmiah');
            $table->string('upload2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plagiats');
    }
};
