<?php

namespace blog\Http\Controllers;

use blog\Article;
use Illuminate\Http\Request;

use blog\Http\Requests;
use blog\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Roumen\Feed\Facades\Feed;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::published()->simplePaginate(5);
        return view("index", compact("articles"));
    }

    public function feed(){
        $feed = Feed::make();
        $feed->setCache(5);

        if(!$feed->isCached()){
            $articles = Article::published()->limit(20)->get();

            $feed->title = 'Quentin.ninja - articles';
            $feed->description = 'Derniers articles de Quentin.ninja';
            $feed->link = URL::to('feed');
            $feed->setDateFormat('datetime');
            $feed->pubdate = $articles[0]->published_at;
            $feed->lang = 'fr';
            $feed->setShortening(false);

            foreach ($articles as $article) {
                $feed->add(
                    $article->title,
                    $article->user->name,
                    URL::to(action("ArticleController@show", $article->url)),
                    $article->published_at,
                    $article->excerpt,
                    $article->content);
            }
        }

        return $feed->render('atom')->header('Content-Type', "application/atom+xml");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //e
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return Response
     */
    public function show($url)
    {
        $article = Article::where("url", $url)->firstOrFail();

        return view("article.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
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
