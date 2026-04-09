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
        Schema::table('siswa', function (Blueprint $table) {
            $table->index('nis')->unique();
            $table->index('kelas');
            $table->index('jurusan')->nullable();
            $table->index('tanggal_lahir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropIndex('nis')->unique();
            $table->dropIndex('kelas');
            $table->dropIndex('jurusan')->nullable();
            $table->dropIndex('tanggal_lahir')->nullable();
        });
    }
};
