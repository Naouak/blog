@extends("admin.app")

@section("content")
    {!! Form::open(["action" => 'Auth\AuthController@getLogin', "class" => "login-form"]) !!}
            <h1>Connexion requise</h1>
            <div>
                {!! Form::label("email", "Email") !!}{!! Form::email("email", old('email'), ["placeholder" => "azure@diamond.com"]) !!}
            </div>

            <div>
                {!! Form::label('password', 'Mot de passe') !!}{!! Form::password('password', ["placeholder" => "hunter2"]) !!}
            </div>

            <div>
                {!! Form::checkbox('remember',1,null,['id' => 'remember']) !!}{!! Form::label('remember', 'Se souvenir de moi') !!}
            </div>

            <div class="submit">
                {!! Form::submit("Connexion") !!}
            </div>

    {!! Form::close() !!}
@endsection

@section('style')
    {!! HTML::style('css/admin/auth.css') !!}
@endsection