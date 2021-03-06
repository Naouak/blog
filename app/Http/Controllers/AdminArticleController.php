<?php

namespace blog\Http\Controllers;

use blog\Article;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

use blog\Http\Requests;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::all();
        return view("admin.article.index",compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.article.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => 'required'
        ]);
        $article = new Article($request->all());
        $article->published_at = Carbon::now();
        $article->content_type = 'html';
        $user = $request->user();
        $user->articles()->save($article);

        return redirect(action('AdminArticleController@edit', $article->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.show', compact('article','articleContent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        /** @var Article $article */
        $article = Article::findOrFail($id);
        $article->update($request->all());

        $return = $request->get("return");
        if($return == "show"){
            return redirect(action("AdminArticleController@show", $id));
        }

        return redirect(action("AdminArticleController@edit", $id));
    }

    /**
     * Show the form for configuring articles Details
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function config($id){
        $article = Article::findOrFail($id);
        return view('admin.article.config', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
