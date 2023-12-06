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
                <h2>Title</h2>
                <input type="text" name="comic[title]" placeholder="タイトル" value="{{ old('comic.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('comic.title') }}</p>
            </div>
            
            <div class="author">
                <h2>Author</h2>
                <input type="text" name="comic[author]" placeholder="作者名"value="{{ old('comic.author') }}"/>
                <p class="author__error" style="color:red">{{ $errors->first('comic.author') }}</p>
            </div>
            
            <div class="day_of_week">
                <h2>連載曜日</h2>
                <input type="checkbox" name="comic[day_of_week]" value="日">日
                <input type="checkbox" name="comic[day_of_week]" value="月">月
                <input type="checkbox" name="comic[day_of_week]" value="火">火
                <input type="checkbox" name="comic[day_of_week]" value="水">水
                <input type="checkbox" name="comic[day_of_week]" value="木">木
                <input type="checkbox" name="comic[day_of_week]" value="金">金
                <input type="checkbox" name="comic[day_of_week]" value="土">土
                <input type="checkbox" name="comic[day_of_week]" value="完結">完結
            </div>
            
            <div class="comic[outline]">
                <h2>Outline</h2>
                <textarea name="comic[outline]" placeholder="この漫画の説明" >{{ old('comic.outline') }}</textarea>
                <p class="outline__error" style="color:red">{{ $errors->first('comic.outline') }}</p>
            </div>
            
            <div class="image">
                <input type="file" name="comic[image]">
                <p class="image__error" style="color:red">{{ $errors->first('comic.image') }}</p>
            </div>
            
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>