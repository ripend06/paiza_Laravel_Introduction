@extends('layout')

@section('content')
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    {{ Form::model($article, ['route' => ['article.update', $article->id]]) }}
        <div class='form-group'>
            {{ Form::label('content', 'Content:') }}
            {{ Form::text('content', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('user_name', 'Name:') }}
            {{ Form::text('user_name', null) }}
        </div>
        <div class="form-group">
            {{ Form::submit('保存する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('article.show', ['id' => $article->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection
