<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('code_trans');
            $table->integer('mobil_id');
            $table->string('nama');
            $table->string('email');
            $table->integer('noktp');
            $table->string('alamat');
            $table->integer('notlpn');
            $table->date('tglawal');
            $table->date('tglakhir');
            $table->integer('durasi');
            $table->boolean('supir');
            $table->integer('hrg_sup');
            $table->integer('tot_harga');
            $table->string('status');
            $table->date('tanggal');
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('transaksis');
    }
}
