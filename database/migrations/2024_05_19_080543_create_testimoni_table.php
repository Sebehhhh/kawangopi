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
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis sebagai primary key dan auto-increment
            $table->string('nama'); // Kolom nama
            $table->text('keterangan'); // Kolom keterangan
            $table->unsignedTinyInteger('rate'); // Kolom rate dengan nilai 1-5
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimoni');
    }
};
