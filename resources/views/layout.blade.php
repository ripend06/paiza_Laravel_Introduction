<!-- 共通化ファイル -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>paiza bbs</title>
        @include('style-sheet') <!-- styleファイル読み込み -->
    </head>
    <body>
        @include('nav') <!-- navファイル読み込み -->
        <div class='container'>
            @yield('content') <!-- 動的content読み込み　各ファイルごとに内容変わる -->
        </div>
    </body>
</html>
