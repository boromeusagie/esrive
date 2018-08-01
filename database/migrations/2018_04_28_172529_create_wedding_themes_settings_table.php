<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeddingThemesSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_themes_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wedding_id')->unsigned();
            $table->foreign('wedding_id')->references('id')->on('weddings');
            $table->string('img_header')->default('default.jpg');
            $table->string('color_theme')->default('default');
            $table->string('font')->nullable();
            $table->string('font_color')->nullable();
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
        Schema::dropIfExists('wedding_themes_settings');
    }
}
