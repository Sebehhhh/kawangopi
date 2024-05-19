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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis sebagai primary key dan auto-increment
            $table->unsignedBigInteger('produk_id'); // Foreign key untuk produk
            $table->integer('quantity'); // Kolom quantity
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at

            // Menambahkan foreign key constraint dengan ON UPDATE CASCADE dan ON DELETE CASCADE
            $table->foreign('produk_id')
                  ->references('id')
                  ->on('produk')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
