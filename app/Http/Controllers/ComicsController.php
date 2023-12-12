<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ComicRequest;
use Cloudinary;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\comics;
use App\Models\keywords;

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
    public function create(keywords $keyword)
    {
        return view('comics.create')->with(['keywords' => $keyword->get()]);
    }
    public function store(Comics $comic, ComicRequest $request, keywords $keyword)
    {
        $input = $request['comic'];

        $input_keywords = $request->keywords_array;  //keywords_arrayはnameで設定した配列名
        
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
                //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
                $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
                //dd($image_url);  //画像のURLを画面に表示
                $input += ['image_url' => $image_url];
        }else{
            $image_url = 'https://res.cloudinary.com/div7ziwrz/image/upload/v1702399263/20200501_noimage_ysp3py.jpg';
            $input += ['image_url' => $image_url];
        }
               
        $comic->fill($input)->save();
        
        
        $keyword_type_str=$request['keyword_type'];
        $keywords_type_array = explode('、',$keyword_type_str);

        foreach ($keywords_type_array as $input_keywords_type_array){
            $keyword= new Keywords();
            $keyword->keyword_type = $input_keywords_type_array;
            $keyword->timestamps = false;
            $keyword->save();
        }

        //keywordsテーブルから最新を取得する
        $keyword_numbers = $keyword->orderBy('keyword_id', 'DESC')->take(count($keywords_type_array))->get(['keyword_id']);
        //$keyword_nums = array_values($keyword_numbers);
        $keyword_nums=$keyword_numbers->pluck('keyword_id');
        foreach ($keyword_nums as $keyword_num){
        array_push($input_keywords,$keyword_num);
        }
        //attachメソッドを使って中間テーブルにデータを保存
        $comic->keywords()->attach($input_keywords); 
        return redirect('/comics/' . $comic->comic_id);
    }
    
    public function edit(Comics $comic,keywords $keyword)
    {
        return view('comics.edit')->with(['comics' => $comic,'keywords' => $keyword->get()]);
    }
    
    public function update(ComicRequest $request, Comics $comic)
    {
        $input_comic = $request['comic'];
        
        $input_keywords = $request->keywords_array;  //keywords_arrayはnameで設定した配列名
        
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            //dd($image_url);  //画像のURLを画面に表示
            $input_comic += ['image_url' => $image_url];
        }
        $comic->fill($input_comic)->save();
        
                $keyword_type_str=$request['keyword_type'];
        $keywords_type_array = explode('、',$keyword_type_str);

        foreach ($keywords_type_array as $input_keywords_type_array){
            $keyword= new Keywords();
            $keyword->keyword_type = $input_keywords_type_array;
            $keyword->timestamps = false;
            $keyword->save();
        }

        //keywordsテーブルから最新を取得する
        $keyword_numbers = $keyword->orderBy('keyword_id', 'DESC')->take(count($keywords_type_array))->get(['keyword_id']);
        //$keyword_nums = array_values($keyword_numbers);
        $keyword_nums=$keyword_numbers->pluck('keyword_id');
        foreach ($keyword_nums as $keyword_num){
        array_push($input_keywords,$keyword_num);
        }
        //attachメソッドを使って中間テーブルにデータを保存
        //$comic->keywords()->attach($input_keywords); 
        $comic->keywords()->syncWithoutDetaching($input_keywords);
        return redirect('/comics/' . $comic->comic_id);
        
    }
    
    public function delete(Comics $comic)
    {
        $comic->delete();
        return redirect('/');
    }
}
