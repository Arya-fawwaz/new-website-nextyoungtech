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
        Schema::table('permintaan_penawaran', function (Blueprint $table) {
            $table->string('nama_proyek')->nullable();
            $table->string('warna_utama')->nullable();
            $table->string('target_pengguna')->nullable();
            $table->text('deskripsi_proyek')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permintaan_penawaran', function (Blueprint $table) {
            $table->dropColumn(['nama_proyek', 'warna_utama', 'target_pengguna', 'deskripsi_proyek']);
        });
    }
};
