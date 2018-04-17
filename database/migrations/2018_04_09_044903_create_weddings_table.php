<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weddings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
          $table->string('groom_full')->nullable();
          $table->string('groom_nick')->nullable();
          $table->string('groom_pic')->default('noimg.png');
          $table->text('groom_profile')->nullable();
          $table->string('bride_full')->nullable();
          $table->string('bride_nick')->nullable();
          $table->string('bride_pic')->default('noimg.png');
          $table->text('bride_profile')->nullable();
          $table->string('wedding_theme')->default('EsriveFree01');
          $table->foreign('wedding_theme')->references('id')->on('wedding_themes');
          $table->string('wedding_url')->unique();
          $table->string('wedding_cer')->default('Akad Nikah');
          $table->string('wedding_cer_date')->nullable();
          $table->time('wedding_cer_begin')->nullable();
          $table->time('wedding_cer_end')->nullable();
          $table->string('wedding_cer_place')->nullable();
          $table->string('wedding_cer_address')->nullable();
          $table->string('wedding_cer_lat')->nullable();
          $table->string('wedding_cer_long')->nullable();
          $table->string('wedding_rec')->default('Resepsi Pernikahan');
          $table->string('wedding_rec_date')->nullable();
          $table->time('wedding_rec_begin')->nullable();
          $table->time('wedding_rec_end')->nullable();
          $table->string('wedding_rec_place')->nullable();
          $table->string('wedding_rec_address')->nullable();
          $table->string('wedding_rec_lat')->nullable();
          $table->string('wedding_rec_long')->nullable();
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
        Schema::dropIfExists('weddings');
    }
}
