<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->date('tgl_pinjam')->nullable();
            $table->date('tgl_pengembalian')->nullable();
            $table->integer('buku_id')->unsigned()->nullable();
            $table->foreign('buku_id')->references('id')->on('bukus')
                    ->onDelete('cascade');
            $table->integer('siswa_id')->unsigned()->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswas')
                    ->onDelete('cascade');
            $table->enum('status',['0','1'])->default('0');
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
        Schema::dropIfExists('aktivitas');
    }
}
