@extends("admin.app")

@section("content")
    <h1>Administration</h1>

    <div class="quicklinks">
        <ul>
            <li><a href="{{ action("AdminArticleController@index") }}">Liste des articles</a></li>
        </ul>
    </div>
@endsection
