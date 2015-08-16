@extends('admin.app')

@section('content')
    <h1>{{ $article->title  }}</h1>

    <a href="{{ action('AdminArticleController@edit',$article->id) }}">Modifier l'article</a>

    <article>
        {!! $articleContent !!}
    </article>
@endsection