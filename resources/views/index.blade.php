@extends('layout') <!-- 共通化ファイル読み込み -->

@section('content') <!-- 各ファイルの動的コンテンツを記述 -->
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p> <!-- message変数の内容表示 -->
    @include('search') <!-- searchファイルを読み込み -->

    <table class='table table-striped table-hover'>
        <!-- foreachでひとつひとつ取り出しする -->
        @foreach ($articles as $article)
            <tr>
                <td>
                    <!-- リンクに、記事詳細ルートを指定。　パラメーターidを、$article->idにせて地 -->
                    <a href='{{ route("article.show", ["id" =>  $article->id]) }}'>
                        <!-- DBのcontentを表示 -->
                        {{ $article->content }}
                    </a>
                </td>
                <!-- DBのusernameを表示 -->
                <td>{{ $article->user_name }}</td>
            </tr>
        @endforeach
    </table>

    <div>
        <!-- リンクに、新規投稿ルートを指定 -->
        <a href={{ route('article.new') }} class='btn btn-outline-primary'>新規投稿</a>
    </div>
@endsection <!-- 各ファイルの動的コンテンツを記述--終了 -->
