@extends('admin.app')

@section('content')
    {!! Form::model($article, ["action" => ['AdminArticleController@update', $article->id], "method" => "PATCH"]) !!}

    <div class="article-simpleform">
        <a class="button-link" href="{{ action('AdminArticleController@index') }}">&#8249;</a>
        {!! Form::text("title", null, ["class" => "article-form-title"]) !!}
        {!! Form::submit("Sauvegarder", ["class" => "button-link"]) !!}
    </div>
    <div class="article-form-content">
        <div class="column column-left">
            <div class="tab-strip">
                <span class="tab-tag selected" data-target="content">Édition du texte</span>
                <span class="tab-tag" data-target="excerpt">Édition de l'extrait</span>
                <span class="tab-tag" data-target="article-config">Configuration</span>
            </div>
            <div class="tab-content">
                {!! Form::textarea("content", null, ["class" => "content-editor selected", "id" => "content", "data-content-type" => $article->content_type]) !!}
                {!! Form::textarea("excerpt", null, ["class" => "excerpt-editor", "id" => "excerpt", "data-content-type" => $article->content_type]) !!}
                <div class="tab-panel" id="article-config">
                    <div>
                        {!! Form::label("url", "URL de l'article") !!}
                        {!! Form::text("url") !!}
                    </div>
                    <div>
                        {!! Form::checkbox("published",1,null,['id' => 'published']) !!}
                        {!! Form::label("published", "Publié") !!}
                    </div>
                    <div>
                        {!! Form::label("published_at", "Publication le :") !!}
                        {!! Form::input("datetime","published_at") !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="column column-right">
            <div class="tab-strip">
                <span class="tab-tag selected" data-target="content-preview">Previsualisation</span>
                <span class="tab-tag" data-target="excerpt-preview">Previsualisation de l'extrait</span>
                <span class="tab-tag" data-target="notes">Notes</span>
            </div>
            <div class="tab-content">
                <div class="content-preview selected" id="content-preview">
                    <article>{!! $article->content_html !!}</article>
                </div>
                <div class="excerpt-preview" id="excerpt-preview">
                    <article>{!! $article->excerpt_html !!}</article>
                </div>
                {!! Form::textarea("notes", null, ["class" => "content-editor", "id" => "notes", "data-content-type" => $article->content_type]) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection

@section("style")
    {!! HTML::style("css/admin/article.css") !!}

    <style type="text/css">
        .content{
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            top: 40px;
        }
    </style>
@endsection

@section('javascript')
    {!! HTML::script("js/admin/editor.js") !!}
@endsection