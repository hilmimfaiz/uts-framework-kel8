<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik')->unique();
            $table->date('tanggal_lahir');
            $table->string('jenis_vaksin');
            $table->string('lokasi_vaksin');
            $table->date('tanggal_vaksin');
            // $table->enum('status', ['terdaftar', 'hadir', 'tidak hadir'])->default('terdaftar');
            $table->enum('status', ['terdaftar', 'hadir', 'tidak_hadir'])->default('terdaftar')->change();
            $table->softDeletes(); // Soft delete
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->string('status')->change(); // Balikin ke string kalau rollback
        });
    }
}
