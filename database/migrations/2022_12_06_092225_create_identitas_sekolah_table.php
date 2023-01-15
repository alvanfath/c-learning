<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('negara');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kode_postal');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->string('kepala_sekolah');
            $table->string('pemilik_yayasan');
            $table->string('akreditasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identitas_sekolah');
    }
}
