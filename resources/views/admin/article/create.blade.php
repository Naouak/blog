@extends('admin.app')

@section('content')
    <h1>Créer un article</h1>

    {!! Form::open(["action" => 'AdminArticleController@store']) !!}
        <div class="article-simpleform">
            {!! Form::text("title", null, ["placeholder" => "Mon super article !", "class" => "article-form-title"]) !!}
            {!! Form::submit("Créer l'article", ["class" => "button-link"]) !!}
        </div>
    {!! Form::close() !!}
@endsection

@section("style")
    {!! HTML::style("css/admin/article.css") !!}
@endsection