<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sosmed', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis sebagai primary key dan auto-increment
            $table->string('instagram')->nullable(); // Kolom untuk link Instagram, nullable
            $table->string('facebook')->nullable(); // Kolom untuk link Facebook, nullable
            $table->string('tiktok')->nullable(); // Kolom untuk link TikTok, nullable
            $table->string('whatsapp')->nullable(); // Kolom untuk nomor WhatsApp, nullable
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosmed');
    }
};
