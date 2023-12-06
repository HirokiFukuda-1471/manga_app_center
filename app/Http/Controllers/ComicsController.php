<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComicRequest;
use Cloudinary;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\comics;

class ComicsController extends Controller
{   
    /**
     * Comics一覧を表示する
     * 
     * @param Comics Comicsモデル
     * @return array Comicsモデルリスト
     */
    public function index(comics $comic)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('comics.index')->with(['comics' => $comic->getPaginateByLimit()]);
        //getPaginateByLimit()はPost.phpで定義したメソッドです。
    }
    /**
     * 特定IDのcomicを表示する
     *
     * @params Object comic // 引数の$comicはid=1のcomicインスタンス
     * @return Reposnse comic view
     */
    public function show(comics $comic)
    {
        return view('comics.show')->with(['comics' => $comic]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create()
    {
    return view('comics.create');
    }
    public function store(Comics $comic, ComicRequest $request)
    {
        $input = $request['comic'];
        
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            //dd($image_url);  //画像のURLを画面に表示
            $input += ['image_url' => $image_url];
        }
        
        
        $comic->fill($input)->save();
        return redirect('/comics/' . $comic->comic_id);
    }
}
