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
        Schema::create('transaksi', function (Blueprint $table) {
        $table->id('id_transaksi');
        $table->date('tgl_transaksi');
        $table->foreignId('id_kategori')->constrained('kategori')->onDelete('cascade');
        $table->string('keterangan');
        $table->enum('jenis_transaksi', ['pemasukan', 'pengeluaran']);
        $table->integer('nominal');
        $table->timestamps();
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
