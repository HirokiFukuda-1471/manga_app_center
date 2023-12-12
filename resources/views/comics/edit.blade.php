<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>deliverables</title>
    </head>
   <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/comics/{{ $comics->comic_id }}" method="POST" 
        enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="comic[title]" value="{{ $comics->title }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('comic.title') }}</p>
            </div>
            
            <div class="author">
                <h2>作者</h2>
                <input type="text" name="comic[author]" value="{{ $comics->author }}"/>
                <p class="author__error" style="color:red">{{ $errors->first('comic.author') }}</p>
            </div>
            
            <div class="day_of_week">
                <h2>連載曜日</h2>
                @if($comics->day_of_week=="日")
                <input type="radio" name="comic[day_of_week]" value="日" checked>日
                @else
                <input type="radio" name="comic[day_of_week]" value="日">日
                @endif

                @if($comics->day_of_week=="月")
                <input type="radio" name="comic[day_of_week]" value="月" checked>月
                @else
                <input type="radio" name="comic[day_of_week]" value="月">月
            
                @endif
                
                @if($comics->day_of_week=="火")
                <input type="radio" name="comic[day_of_week]" value="火" checked>火
                @else
                <input type="radio" name="comic[day_of_week]" value="火">火
                @endif
                
                @if($comics->day_of_week=="水")
                <input type="radio" name="comic[day_of_week]" value="水" checked>水
                @else
                <input type="radio" name="comic[day_of_week]" value="水">水
                @endif
                
                @if($comics->day_of_week=="木")
                <input type="radio" name="comic[day_of_week]" value="木" checked>木
                @else
                <input type="radio" name="comic[day_of_week]" value="木">木
                @endif
                
                @if($comics->day_of_week=="金")
                <input type="radio" name="comic[day_of_week]" value="金" checked>金
                @else
                <input type="radio" name="comic[day_of_week]" value="金">金
                @endif
                
                @if($comics->day_of_week=="土")
                <input type="radio" name="comic[day_of_week]" value="土" checked>土
                @else
                <input type="radio" name="comic[day_of_week]" value="土">土
                @endif
                
                @if($comics->day_of_week=="完結")
                <input type="radio" name="comic[day_of_week]" value="完結" checked>完結
                @else
                <input type="radio" name="comic[day_of_week]" value="完結">完結
                @endif
                <p class="day_of_week__error" style="color:red">{{ $errors->first('comic.day_of_week') }}</p>
            </div>
            
            <div class="comic[outline]">
                <h2>Outline</h2>
                <textarea name="comic[outline]">{{ $comics->outline}}</textarea>
                <p class="outline__error" style="color:red">{{ $errors->first('comic.outline') }}</p>
            </div>
            
            <div class="keywords">
                <h2>キーワード</h2>
                @foreach($keywords as $keyword)
                    <label>
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
                <input type="text" name="keyword_type" placeholder="例：バトル、異世界、・・・"/>
                <p class="keyword_type__error" style="color:red">{{ $errors->first('keyword_type') }}</p>
            </div>
            
            <div class="image">
                <input type="file" name="image" >
                <img src="{{ $comics->image_url }}" alt="画像が読み込めません。"/>
            </div>
            
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>