<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('tags_id')->unsigned()->nullable();
            $table->foreign('tags_id')->references('id')->on('tags')
                    ->onDelete('cascade');
            $table->string('kode');
            $table->string('judul_buku');
            $table->enum('status', ['0', '1'])->default('0'); // 0. tersedia , 1.tidak tersedia;
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
        Schema::dropIfExists('bukus');
    }
}
