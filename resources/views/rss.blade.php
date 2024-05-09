<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<rss version="2.0">
    <channel>
        <title>TrueAnime</title>
        <link>{{ $_SERVER['SERVER_NAME'] }}</link>
        <description>Last publications</description>
        <pubDate>{{ $now }}</pubDate>
        <lastBuildDate>{{ $now }}</lastBuildDate>
        <language>ru-ru</language>
        @foreach($articles as $article)
        <item>
            <title>{{$article->title}}</title>
            <link>{{ $_SERVER['SERVER_NAME'].'/anime/'.$article->id }}</link>
            <description>{{ $article->content }}</description>
            <autor>{{ $article->user->name }}</autor>
            <pubDate>{{ $article->created_at }}</pubDate>
            <guid>{{ $_SERVER['SERVER_NAME'].'/anime/'.$article->id }}</guid>
        </item>
        @endforeach
    </channel>
</rss>
