<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //keywordは、serch.blade.phpの<input name="keyword">からきてる
        //キーワードが入ってたら処理
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword'); //キーワードを変数に格納
            $message = 'Welcome my BBS: ' . $keyword;
            //Eloquent ORM を使用してデータベースから記事を検索するためのクエリ
            //Article モデルに対して、content カラムの値が $keyword で指定されたキーワードを部分一致で含むレコードを検索します。
            //'like' 条件を使用することで、部分一致の検索を行います。
            //'%'.$keyword.'%' は、$keyword 変数が含まれる任意の文字列を表します。
            //たとえば、$keyword が 'example' の場合、'%example%' は 'example' を含む任意の文字列と一致します。
            //->get()：検索条件に一致するすべてのレコードを取得します。これにより、検索結果がコレクションとして返されます。
            $articles = Article::where('content', 'like', '%' . $keyword . '%')->get();
        } else {
            $message = 'Welcome my BBS';
            //Eloquent ORM を使用してデータベースから全ての記事を取得するためのクエリ
            $articles = Article::all();
        }
        //変数$message、$articlesをセットして、indexviewファイルに返す
        return view('index', ['message' => $message, 'articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $message = 'New article';
        return view('new', ['message' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Article モデルの新しいインスタンスを作成
        $article = new Article();

        //$article->contentのカラムに保存
        $article->content = $request->content;
        //$article->user_nameのカラムに保存
        $article->user_name = $request->user_name;
        //変更をデータベースに保存
        $article->save();

        //名前付きルートを使用してリダイレクト
        //id パラメータとして $article->id の値を渡す
        return redirect()->route('article.show', ['id' => $article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */

     //、$id はルート定義に含まれるパラメータの一部であり、URLの中の id の値を表しています。このパラメータは、コントローラーメソッドに引数として渡されます。
     //Route::get('/articles/{id}', 'ArticleController@show');
    public function show(Request $request, $id, Article $article)
    {
        $message = 'This is your article ' . $id;
        //Eloquent ORM を使用して、指定されたIDに一致する記事をデータベースから取得
        $article = Article::find($id);
        return view('show', ['message' => $message, 'article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Article $article)
    {
        $message = 'Edit your article ' . $id;
        $article = Article::find($id);
        return view('edit', ['message' => $message, 'article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Article $article)
    {
        $article = Article::find($id);

        $article->content = $request->content;
        $article->user_name = $request->user_name;
        $article->save();
        return redirect()->route('article.show', ['id' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
public function destroy(Request $request, $id, Article $article)
    {
        $article = Article::find($id);
        //Eloquent ORM を使用して、データベースから特定の記事を削除
        $article->delete();
        return redirect('/articles');
    }
}
