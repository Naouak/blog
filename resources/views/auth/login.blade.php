@extends("admin.app")

@section("content")
    {!! Form::open(["action" => 'Auth\AuthController@getLogin']) !!}

        <div>
            {!! Form::label("email", "Email") !!}
            {!! Form::email("email", old('email')) !!}
        </div>

        <div>
            {!! Form::label('password', 'Mot de passe') !!}
            {!! Form::password('password') !!}
        </div>

        <div>
            {!! Form::checkbox('remember',1,null,['id' => 'remember']) !!}
            {!! Form::label('remember', 'Se souvenir de moi') !!}
        </div>

        <div>
            {!! Form::submit() !!}
        </div>

    {!! Form::close() !!}
@endsection