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
        Schema::create('blog', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis sebagai primary key dan auto-increment
            $table->unsignedBigInteger('user_id'); // Foreign key untuk user
            $table->string('judul'); // Kolom judul blog
            $table->text('konten'); // Kolom konten blog
            $table->string('gambar')->nullable(); // Kolom gambar blog, nullable
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at

            // Menambahkan foreign key constraint dengan ON UPDATE CASCADE dan ON DELETE CASCADE
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
