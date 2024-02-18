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
        <p>{{ $article->content }}</p>
        <p>{{ $article->user_name }}</p>

        <p>
            <a href={{ route('article.list') }}>一覧に戻る</a>
        </p>
        <div>
            {{ Form::open(['method' => 'delete', 'route' => ['article.delete', $article->id]]) }}
                {{ Form::submit('削除')}}
            {{ Form::close() }}
        </div>
    </body>
</html>
