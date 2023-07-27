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
        Schema::create('kategori', function(Blueprint $table){
            $table->id();
            $table->string('nama_kategori', 100)->nullable();
            $table->text('deskripsi_kategori')->nullable();
            $table->enum('tipe', ['Pemasukan', 'Pengeluaran'])->default('Pemasukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('kategori');
    }
};
