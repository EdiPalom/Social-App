<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_multimedia')->unsigned();
            $table->string('url');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('id_multimedia')->references('id')->on('multimedia');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_data');
    }
}
