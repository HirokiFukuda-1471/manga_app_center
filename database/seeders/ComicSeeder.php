<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comics')->insert([
                'title' => '',//漫画のタイトル
                'author'=>'',//作者
                'day_of_week'=>'',//連載曜日又は完結
                'outline' => '',//漫画の概要
                'image_url '=>'',//漫画のサムネイル
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
