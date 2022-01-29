<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_post')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_type')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('id_post')->references('id')->on('posts');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_type')->references('id')->on('media_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multimedia');
    }
}
