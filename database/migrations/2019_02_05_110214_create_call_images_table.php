<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_images', function (Blueprint $table) {
            $table->unsignedInteger('call_id');
            $table->string('image_path', 70);
            $table->string('img_extension');
            $table->string('img_name');
            $table->foreign('call_id')->references('id')->on('calls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_images');
    }
}
