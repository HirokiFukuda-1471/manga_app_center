<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics_keywords', function (Blueprint $table) {
            //$table->id('comics_keywords_id');
            $table->bigIncrements('omics_keywords_id');
            $table->unsignedBigInteger('comic_id');
            $table->foreign('comic_id')->references('comic_id')->on('comics');
            $table->unsignedBigInteger('keyword_id');
            $table->foreign('keyword_id')->references('keyword_id')->on('keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
