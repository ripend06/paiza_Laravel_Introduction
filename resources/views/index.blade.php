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
            <a href='{{ route("article.show", ["id" => $article->id] )}}'>
                {{ $article->content }}
            </a>
        @endforeach
    </body>
</html>