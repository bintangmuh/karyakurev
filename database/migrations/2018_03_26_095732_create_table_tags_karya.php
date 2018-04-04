<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTagsKarya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_karya', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karya_id')->unsigned();
            $table->integer('tags_id')->unsigned();
            $table->timestamps();

            $table->foreign('karya_id')->references('id')->on('karya')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_karya');
    }
}
