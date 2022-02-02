<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->boolean('status')->default(1);
            // $table->bigInteger('media_data_id')->unsigned();
            
            // $table->unsignedBigInteger('media_data_id')->nullable()->change();
            $table->unsignedBigInteger('media_data_id')->nullable();
            $table->timestamps();
            $table->foreign('media_data_id')->references('id')->on('media_data');

            $table->foreignId('user_id')->constrained();
   
            $table->foreignId('post_id')->constrained();

            // $table->foreignId('media_data_id')->nullable()->constrained();

            // $table->bigInteger('user_id')->unsigned();

            // $table->bigInteger('post_id')->unsigned();

            // $table->foreign('user_id')->references('id')->on('users');

            // $table->foreign('post_id')->references('id')->on('posts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
