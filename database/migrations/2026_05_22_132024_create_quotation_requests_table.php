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
        Schema::create('permintaan_penawaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klien');
            $table->string('email_klien');
            $table->string('telepon_klien');
            $table->string('tipe_proyek');
            $table->json('fitur');
            $table->decimal('estimasi_harga', 12, 2);
            $table->text('catatan')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'approved'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_penawaran');
    }
};
