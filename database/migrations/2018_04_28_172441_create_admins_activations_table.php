<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins_activations', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('admin_id')->unsigned();
          $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
          $table->string('activation_token');
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
        Schema::dropIfExists('admins_activations');
    }
}
