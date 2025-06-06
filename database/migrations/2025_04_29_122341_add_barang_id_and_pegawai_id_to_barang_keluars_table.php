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
        Schema::table('barang_keluars', function (Blueprint $table) {
            Schema::table('barang_keluars', function (Blueprint $table) {
                $table->unsignedBigInteger('barang_id')->nullable()->after('id');
                $table->unsignedBigInteger('pegawai_id')->nullable()->after('barang_id');
        
                // Optional: tambahkan relasi foreign key
                $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('set null');
                $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('set null');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            Schema::table('barang_keluars', function (Blueprint $table) {
                $table->dropForeign(['barang_id']);
                $table->dropForeign(['pegawai_id']);
                $table->dropColumn(['barang_id', 'pegawai_id']);
            });
        });
    }
};
