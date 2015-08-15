@extends('admin.app')

@section('content')
    <h1>Nouvel Article</h1>
    {!! Form::open() !!}

        {!! Form::label("title","Titre de l'article") !!}
        {!! Form::text("title") !!}

        {!! Form::submit("Créer l'article") !!}

    {!! Form::close() !!}
@endsection