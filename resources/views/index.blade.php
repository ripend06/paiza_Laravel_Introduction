<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>paiza bbs</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>paiza bbs</h1>
        <p>{{ $message }}</p>
        @foreach ($articles as $article)
	    <p>
                <a href='{{ route("article.show", ["id" => $article->id]) }}'>
		    {{ $article->content }},
		    {{ $article->user_name }}
                </a>
            </p>
        @endforeach
        <div>
            <a href={{ route('article.new') }}>新規投稿</a>
        </div>
    </body>
</html>
