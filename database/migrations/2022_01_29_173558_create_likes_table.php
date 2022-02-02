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
            $table->bigInteger('media_data_id')->unsigned()->nullable()->default(null);
            // $table->bigInteger('media_data_id')->unsigned()->nullable();
            
            $table->timestamps();

            // $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('media_data_id')->references('id')->on('media_data');
            
            $table->foreignId('user_id')->constrained();
            // $table->foreignId('media_data_id')->nullable()->constrained();
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
