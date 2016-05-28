@extends('app')

@section('content')
    @foreach($articles as $article)
        <article class="article-excerpt">
            <div class="article-header">
                <h2><a href="{{ action("ArticleController@show", $article->url) }}">{{ $article->title }}</a></h2>
                <div class="publication_infos">Publié {{ $article->published_at->diffForHumans() }} par {{ $article->user->name }}</div>
            </div>
            <div class="excerpt">
                {!! $article->excerpt_html !!}
            </div>
            <div class="readmore"><a href="{{ action("ArticleController@show", $article->url) }}">Lire l'article &gt;&gt;</a></div>
        </article>
    @endforeach

    {!! $articles->render(new \blog\Presenter\SimplePagination($articles)) !!}
@endsection

@section('style')
    {!! HTML::style("css/article.css") !!}
@endsection