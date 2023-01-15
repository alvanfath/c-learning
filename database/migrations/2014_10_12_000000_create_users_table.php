<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nis', 8)->unique();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('email')->unique();
            $table->integer('id_kelas');
            $table->integer('id_tingkat');
            $table->integer('id_jurusan');
            $table->string('password');
            $table->string('foto')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
