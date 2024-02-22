@extends('layout')

@section('content')
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    <p>{{ $article->content }}</p>
    <p>{{ $article->user_name }}</p>

    <p>

        <a href={{ route('article.list') }} class='btn btn-outline-primary'>一覧に戻る</a>
        <!-- リンクに、記事投稿ルートを指定。　パラメーターidを、$article->idにせて地 -->
        <a href={{ route('article.edit', ["id" => $article->id]) }} class='btn btn-outline-primary'>編集</a>
    </p>
    <div>
        <!-- <form method="POST" action="/article/1">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-outline-secondary">削除</button>
        </form> -->
        {{ Form::open(['method' => 'delete', 'route' => ['article.delete', $article->id]]) }}
            {{ Form::submit('削除', ['class' => 'btn btn-outline-secondary']) }}
        {{ Form::close() }}
    </div>
@endsection
