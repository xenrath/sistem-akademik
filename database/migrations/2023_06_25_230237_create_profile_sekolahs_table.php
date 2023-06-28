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
        Schema::create('profile_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('home_judul')->nullable();
            $table->text('home_deskripsi')->nullable();
            $table->string('home_gambar')->nullable();
            $table->text('about_deskripsi')->nullable();
            $table->text('about_visi')->nullable();
            $table->text('about_misi')->nullable();
            $table->json('galeri_gambar')->nullable();
            $table->string('ppdb_flayer')->nullable();
            $table->string('kontak_alamat')->nullable();
            $table->string('kontak_email')->nullable();
            $table->string('kontak_telp')->nullable();
            $table->string('kontak_latitude')->nullable();
            $table->string('kontak_longitude')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_sekolahs');
    }
};
