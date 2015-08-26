@extends('app')

@section('content')
    @foreach($articles as $article)
        <article>
            <h2>{{ $article->title }}</h2>
            <div class="excerpt">
                {!! $article->excerpt_html !!}
            </div>
            <div class="readmore"><a href="{{ action("ArticleController@show", $article->id) }}">Lire l'article</a></div>
        </article>
    @endforeach
@endsection