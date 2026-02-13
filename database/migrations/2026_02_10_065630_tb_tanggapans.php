<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_tanggapans', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();
            $table->foreignId('id_pengaduan')->constrained('tb_pengaduans')->cascadeOnDelete();
            $table->date('tgl_tanggapan');
            $table->text('tanggapan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_tanggapans');
    }
};
