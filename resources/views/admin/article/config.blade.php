@extends('admin.app')

@section('content')
    <h1>{{$article->title}}</h1>

    {!! Form::model($article, ["action" => ['AdminArticleController@update', $article->id], "method" => "PATCH"]) !!}
        <div>
            {!! Form::checkbox("published",1,null,['id' => 'published']) !!}
            {!! Form::label("published", "Publié") !!}
        </div>
        <div>
            {!! Form::label("published_at", "Publication le :") !!}
            {!! Form::input("datetime","published_at") !!}
        </div>
    {!! Form::close() !!}
@endsection

@section("style")
    {!! HTML::style("css/admin/article.css") !!}
@endsection

@section('javascript')
    {!! HTML::script("contrib/js/commonmark.js") !!}
    {!! HTML::script("js/admin/editor.js") !!}
@endsection