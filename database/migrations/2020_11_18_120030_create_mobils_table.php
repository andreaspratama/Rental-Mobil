<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->integer('merk_id');
            $table->string('slug');
            $table->string('nama');
            $table->string('warna');
            $table->integer('tahun');
            $table->string('plat');
            $table->integer('sewa');
            $table->boolean('status');
            $table->text('gambar');
            $table->integer('kursi');
            $table->longText('deskripsi');
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
        Schema::dropIfExists('mobils');
    }
}
