<?php

namespace App\Http\Controllers;
//use宣言は外部にあるクラスをPostController内にインポートできる。
use Illuminate\Http\Request;
use App\Models\ComicRegister;
//この場合、App\Models内のComicRegisterクラスをインポートしている。
use App\Models\ComicRegister;
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
class ComicRegisterController extends Controller
{
    public function index(Comicregister $comicregister)//インポートしたComicregisterをインスタンス化して$comicregisterとして使用。
    {
    return $comicregister->get();//$comicrgisterの中身を戻り値にする。
    }
}
