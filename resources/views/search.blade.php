<!-- フォームビルダーメソッド getを指定 -->
{{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }} <!-- クロスサイトリクエストフォージェリ（CSRF）攻撃から保護するためのトークンを生成するためのBladeディレクティブ -->
    <div class='form-group'>
        <!--  Blade ディレクティブ -->
        <!-- <label for="keyword">キーワード:</label> -->
        {{ Form::label('keyword', 'キーワード:') }}
        <!-- nullは初期値 -->
        <!-- <input type="text" name="keyword" class="form-control"> -->
        {{ Form::text('keyword', null, ['class' => 'form-control']) }}
    </div>
    <div class='form-group'>
        <!-- <input type="submit" value="検索" class="btn btn-outline-primary"> -->
        {{ Form::submit('検索', ['class' => 'btn btn-outline-primary'])}}
        <!-- リンクに、記事一覧を指定 -->
        <a href={{ route('article.list') }}>クリア</a>
    </div>
{{ Form::close() }}
