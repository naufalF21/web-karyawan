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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('jenis');
            $table->date('tanggal')->nullable();
            $table->time('mulai_jam_cuti')->nullable();
            $table->time('sd_jam_cuti')->nullable();
            $table->date('sd_tanggal')->nullable();
            $table->date('masuk_tanggal')->nullable();
            $table->date('lapor_tanggal')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
