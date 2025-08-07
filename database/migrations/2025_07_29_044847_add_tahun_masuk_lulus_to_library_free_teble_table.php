s<?php

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
            Schema::table('library_free_teble', function (Blueprint $table) {
                $table->string('tahun_masuk')->after('keperluan');
                $table->string('tahun_lulus')->after('tahun_masuk');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('library_free_teble', function (Blueprint $table) {
                //
            });
        }
    };
