<x-app-layout>
    <x-slot name="header">
        show
    </x-slot>
    <body>
        <h1 class="comic_title">
            {{ $comics->title }}
        </h1>
        <div class="content">
            
            <div class="content_author">
                <h3>作者</h3>
                <p>{{ $comics->author }}</p>    
            </div>
            
            <div class="content_day_of_week">
                <h3>連載曜日</h3>
                @if($comics->day_of_week!='完結')
                <p>{{ $comics->day_of_week }}曜日</p> 
                @else
                <p>{{ $comics->day_of_week }}</p> 
                @endif 
            </div>
            
            <div class="content_outline">
                <h3>概要</h3>
                <p>{{ $comics->outline }}</p>    
            </div>
            
            <h3>キーワード</h3>
            <h5 class='keyword'>
            
            @foreach($comics->keywords as $keyword)   
                {{ $keyword->keyword_type }}
            @endforeach
            
            </h5>
                        
            @if($comics->image_url)
            <div>
                <img src="{{ $comics->image_url }}" alt="画像が読み込めません。"/>
            </div>
            @endif
            
            <div class="edit"><a href="/comics/{{ $comics->comic_id }}/edit">編集</a></div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>