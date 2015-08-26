@extends('admin.app')

@section('content')
    <h1>{{ $article->title  }}</h1>

    <a href="{{ action('AdminArticleController@index') }}">Liste des articles</a>
    <a href="{{ action('AdminArticleController@edit',$article->id) }}">Modifier l'article</a>

    {!! Form::model($article, ["action" => ['AdminArticleController@update', $article->id], "method" => "PATCH"]) !!}
        {!! Form::hidden("return","show") !!}
        <div>
            {!! Form::checkbox("published",1,null,['id' => 'published']) !!}
            {!! Form::label("published", "Publié") !!}
        </div>
        <div>
            {!! Form::label("published_at", "Publication le :") !!}
            {!! Form::input("datetime","published_at") !!}
        </div>
        <div>
            {!! Form::submit("Mettre à jour") !!}
        </div>
    {!! Form::close() !!}

    <article class="excerpt">
        <h2>Extrait</h2>
        {!! $article->excerpt_html !!}
    </article>
    <article>
        <h2>Article</h2>
        {!! $article->content_html !!}
    </article>
@endsection

@section("style")
    {!! HTML::style("css/admin/article.css") !!}
@endsection