@extends('app')

@section('content')
    <article>
        <div class="article-header">
            <h1>{{ $article->title }}</h1>
            <div class="publication_infos">Publié {{ $article->published_at->diffForHumans() }} par {{ $article->user->name }}</div>
        </div>
        <div class="content">
            {!! $article->content_html !!}
        </div>
    </article>
@endsection

@section('style')
    {!! HTML::style("css/article.css") !!}
@endsection