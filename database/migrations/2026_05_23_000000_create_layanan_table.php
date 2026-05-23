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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan');
            $table->string('nama_paket');
            $table->string('badge')->nullable();
            $table->text('deskripsi');
            $table->decimal('harga', 12, 2);
            $table->json('fitur_list');
            $table->string('ikon')->default('fa-solid fa-code');
            $table->string('warna_aksen')->default('primary');
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
