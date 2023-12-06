<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>deliverables</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>manga_app_center</h1>
        <a href='/comics/create'>create</a>
        <div class='comics'>
            @foreach ($comics as $comic)
            <div class='comic'>
                <h2 class='title'><a href="/comics/{{ $comic->comic_id }}">{{ $comic->title }}</a></h2>
                @if($comic->image_url)
                <div>
                    <a href="/comics/{{ $comic->comic_id }}"><img src="{{ $comic->image_url }}" alt="画像が読み込めません。"/></a>
                </div>
                @endif
                
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $comics->links() }}
        </div
    </body>
</html>