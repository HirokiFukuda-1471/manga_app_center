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
            //$table->bigIncrements('omics_keywords_id');
            //$table->unsignedBigInteger('comic_id');
            //$table->foreign('comic_id')->references('comic_id')->on('comics');
            //$table->unsignedBigInteger('keyword_id');
            //$table->foreign('keyword_id')->references('keyword_id')->on('keywords');
            
            $table->foreignId('comic_id')->constrained('comics', 'comic_id')->cascadeOnUpdate()->cascadeOnDelete();   //参照先のテーブル名を
            $table->foreignId('keyword_id')->constrained('keywords', 'keyword_id')->cascadeOnUpdate()->cascadeOnDelete();    //constrainedに記載
            $table->primary(['comic_id', 'keyword_id']);
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
