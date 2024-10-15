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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('penyelenggara_event');
            $table->string('judul_event');
            $table->string('deskripsi_event');
            $table->string('jenis_event');
            $table->integer('kouta_peserta');
            $table->string('link_akses')->nullable();
            $table->datetime('tanggal_dan_jam');
            $table->string('lokasi');
            $table->decimal('harga', 10, 2)->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
