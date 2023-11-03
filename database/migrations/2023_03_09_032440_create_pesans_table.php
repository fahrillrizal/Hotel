<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna','25');
            $table->string('email','30');
            $table->string('no_hp','13');
            $table->foreignId('kamar_id')->constrained();
            $table->string('nama_tamu','30');
            $table->datetime('chek_in');
            $table->datetime('chek_out');
            $table->integer('jumlah');
            $table->boolean('confirm')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesans');
    }
}