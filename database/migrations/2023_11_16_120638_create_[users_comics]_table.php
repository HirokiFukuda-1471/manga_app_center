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
        Schema::create('users_comics', function (Blueprint $table) {
            //$table->id('users_comics_id');
            //$table->bigIncrements('users_comics_id');
            //$table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('user_id')->on('users');
            //$table->unsignedBigInteger('comic_id');
            //$table->foreign('comic_id')->references('comic_id')->on('comics');
            
            $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnUpdate()->cascadeOnDelete();   //参照先のテーブル名を
            $table->foreignId('comic_id')->constrained('comics', 'comic_id')->cascadeOnUpdate()->cascadeOnDelete();    //constrainedに記載
            $table->primary(['user_id', 'comic_id']);
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
