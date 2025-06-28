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
        Schema::create('standars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('categorie');
            $table->string('author');
            $table->year('year');
            $table->string('writer');
            $table->string('type');
            $table->text('info')->nullable();
            $table->string('cover')->nullable();
            $table->string('documen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standars');
    }
};
