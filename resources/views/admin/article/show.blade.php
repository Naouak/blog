@extends('admin.app')

@section('content')
    <h1>{{ $article->title  }}</h1>

    <article>
        {!! $articleContent !!}
    </article>
@endsection