@extends('admin.app')

@section('content')

    <h1>Liste des articles</h1>

    <ul>
    @foreach($articles as $article)
        <li>
            <a href="{{ action("AdminArticleController@show", $article->id) }}">{{ $article->title }}</a>
        </li>
    @endforeach
    </ul>

@endsection