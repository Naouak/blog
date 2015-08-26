@extends('app')

@section('content')
    @foreach($articles as $article)
        <article>
            <div class="article-header">
                <h2>{{ $article->title }}</h2>
                <div class="publication_infos">Publié {{ $article->published_at->diffForHumans() }} par {{ $article->user->name }}</div>
            </div>
            <div class="excerpt">
                {!! $article->excerpt_html !!}
            </div>
            <div class="readmore"><a href="{{ action("ArticleController@show", $article->url) }}">Lire l'article</a></div>
        </article>
    @endforeach
@endsection

@section('style')
    {!! HTML::style("css/article.css") !!}
@endsection