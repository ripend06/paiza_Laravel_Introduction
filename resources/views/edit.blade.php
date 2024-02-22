@extends('layout')

@section('content')
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    <!-- Laravel Collective のフォームビルダーを使用して、モデルのデータを使用してフォームを生成 -->
    <!-- <form method="POST" action="http://example.com/article/1" accept-charset="UTF-8"> -->
    <!-- $article：フォームにバインドされるモデルのインスタンスです。この場合、$article 変数によって指定された記事のデータがフォームにバインドされます。 -->
    <!-- ['route' => ['article.update', $article->id]]：フォームが送信された場合のリクエスト先のルートを指定します。 -->
    <!-- 'route' オプションには、article.update という名前のルートを指定し、その際に article->id の値を id パラメータとして渡します。 -->
    {{ Form::model($article, ['route' => ['article.update', $article->id]]) }}
        <div class='form-group'>
            <!-- <label for="content">Content:</label> -->
            {{ Form::label('content', 'Content:') }}
            <!-- <input type="text" name="content" value=""> -->
            {{ Form::text('content', null) }}
        </div>
        <div class='form-group'>
            <!-- <label for="user_name">Name:</label> -->
            {{ Form::label('user_name', 'Name:') }}
            <!-- <input type="text" id="user_name" name="user_name" value=""> -->
            {{ Form::text('user_name', null) }}
        </div>
        <div class="form-group">
            <!-- <button type="submit" class="btn btn-primary">保存する</button> -->
            {{ Form::submit('保存する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('article.show', ['id' => $article->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection
