<x-app-layout>
    <x-slot name="header">
        index
    </x-slot>
    <body>
        <h1>manga_app_center</h1>
        <p>ログインユーザー：{{ Auth::user()->name }}</p>
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
                <form action="/comics/{{ $comic->comic_id }}" id="form_{{ $comic->comic_id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $comic->comic_id }})">削除</button> 
                </form>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $comics->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>