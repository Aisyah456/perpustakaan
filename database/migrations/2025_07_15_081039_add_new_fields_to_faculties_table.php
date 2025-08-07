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
        Schema::table('faculties', function (Blueprint $table) {
            $table->dropColumn('kode');
            $table->dropColumn('nama_fakultas');
            $table->string('name')->after('id');
            $table->string('code')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table->string('kode')->unique();
            $table->string('nama_fakultas');
            $table->dropColumn('name');
            $table->dropColumn('code');
        });
    }
};
