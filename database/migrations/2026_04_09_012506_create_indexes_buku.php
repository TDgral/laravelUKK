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
        Schema::table('bukus', function (Blueprint $table) {
            $table->index('judul');
            $table->index('penulis');
            $table->index('penerbit');
            $table->index('tahun_terbit')->nullable();
            $table->index('isbn')->nullable();
            $table->index('jumlah_halaman');
            $table->index('stok')->default(0);
            $table->index('lokasi_rak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropIndex('penulis');
            $table->dropIndex('penerbit');
            $table->dropIndex('tahun_terbit')->nullable();
            $table->dropIndex('isbn')->nullable();
            $table->dropIndex('jumlah_halaman');
            $table->dropIndex('stok')->default(0);
            $table->dropIndex('lokasi_rak')->nullable();
            $table->dropIndex('judul');
        });
    }
};
