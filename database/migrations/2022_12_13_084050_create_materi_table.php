<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('mapel_id');
            $table->string('tingkat_id');
            $table->string('jurusan_id')->nullable();
            $table->enum('tipe', ['video', 'file']);
            $table->string('file');
            $table->string('deskripsi')->nullable();
            $table->string('uploaded_by');
            $table->integer('id_guru');
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
        Schema::dropIfExists('materi');
    }
}
