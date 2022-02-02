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
            $table->string('url');
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreignId('post_id')->constrained();
            $table->foreignId('media_type_id')->constrained();
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
