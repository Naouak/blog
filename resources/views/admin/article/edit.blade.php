@extends('admin.app')

@section('content')
    {!! Form::model($article, ["action" => ['AdminArticleController@update', $article->id], "method" => "PATCH"]) !!}

    {!! Form::label("title","Titre de l'article") !!}
    {!! Form::text("title") !!}

    {!! Form::label("excerpt","En-tête") !!}
    {!! Form::textarea("excerpt") !!}

    {!! Form::label("content","Texte") !!}
    {!! Form::textarea("content") !!}

    {!! Form::submit("Mettre à jour l'article") !!}

    <a href="{{ action("AdminArticleController@show", $article->id) }}">Revenir</a>

    {!! Form::close() !!}
@endsection