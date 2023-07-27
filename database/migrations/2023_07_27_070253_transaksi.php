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
        Schema::create('transaksi', function(Blueprint $table){
            $table->id();
            $table->integer('id_kategori')->nullable();
            $table->string('nama_kategori', 100)->nullable();
            $table->enum('jenis_transaksi', ['Pemasukan', 'Pengeluaran'])->default('Pemasukan');
            $table->integer('nominal')->nullable();
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('transaksi');
    }
};