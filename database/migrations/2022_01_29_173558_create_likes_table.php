<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_user')->unsigned();
            // $table->bigInteger('id_multimedia')->unsigned();
            $table->timestamps();

            // $table->foreign('id_user')->references('id')->on('users');
            // $table->foreign('id_multimedia')->references('id')->on('multimedia');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('multimedia_id')->nullable()->constrained();
            $table->foreignId('post_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
