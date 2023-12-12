<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>deliverables</title>
    </head>
    <body>
        <h1>manga_app_center</h1>
        <form action="/comics" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="comic[title]" placeholder="タイトル" value="{{ old('comic.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('comic.title') }}</p>
            </div>
            
            <div class="author">
                <h2>作者</h2>
                <input type="text" name="comic[author]" placeholder="作者名"value="{{ old('comic.author') }}"/>
                <p class="author__error" style="color:red">{{ $errors->first('comic.author') }}</p>
            </div>
            
            <div class="day_of_week">
                <h2>連載曜日</h2>
                <input type="radio" name="comic[day_of_week]" value="日"checked="checked">日
                <input type="radio" name="comic[day_of_week]" value="月">月
                <input type="radio" name="comic[day_of_week]" value="火">火
                <input type="radio" name="comic[day_of_week]" value="水">水
                <input type="radio" name="comic[day_of_week]" value="木">木
                <input type="radio" name="comic[day_of_week]" value="金">金
                <input type="radio" name="comic[day_of_week]" value="土">土
                <input type="radio" name="comic[day_of_week]" value="完結">完結
                <p class="day_of_week__error" style="color:red">{{ $errors->first('comic.day_of_week') }}</p>
            </div>
            
            <div class="outline">
                <h2>概要</h2>
                <textarea name="comic[outline]" placeholder="この漫画の説明" >{{ old('comic.outline') }}</textarea>
                <p class="outline__error" style="color:red">{{ $errors->first('comic.outline') }}</p>
            </div>
            
            <div class="keywords">
                <h2>キーワード</h2>
                @foreach($keywords as $keyword)
                    <label>
                        {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                        <input type="checkbox" value="{{ $keyword->keyword_id }}" name="keywords_array[]">
                            {{$keyword->keyword_type}}
                        </input>
                    </label>
                @endforeach 
                <p class="keywords__error" style="color:red">{{ $errors->first('keywords_array') }}</p>
            </div>
            <div class="keyword_type">
                <p>漫画に適したキーワードがない場合、こちらからキーワードを作成できます</p>
                <p>キーワードは「、」で分けることが出来ます</p>
                <input type="text" name="keyword_type" placeholder="例：バトル、異世界、・・・" value="{{ old('keyword_type') }}"/>
                <p class="keyword_type__error" style="color:red">{{ $errors->first('keyword_type') }}</p>
            </div>
            
            <div class="image">
                <input type="file" name="image">
            </div>
            
            <input type="submit" value="登録"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>