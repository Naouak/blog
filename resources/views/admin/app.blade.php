<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    @section('metadata')
        <title>Administration</title>
    @show
    {!! HTML::style("css/admin/app.css") !!}
    @yield('style')
</head>
<body>

    @section('nav')
    <nav class="main-nav">
        <div class="nav-element"><span class="title">Administration</span></div>
        @if(Auth::user())
            <ul>
                <li class="nav-element">
                    <a href="{{ action("AdminController@index") }}">Dashboard</a>

                </li>
                <li class="nav-element">
                    <a href="{{ action("AdminArticleController@index") }}">
                        Articles
                    </a>
                </li>
                <li class="nav-element">
                    <a href="{{ action("AdminArticleController@create") }}">
                        Nouvel article
                    </a>
                </li>
            </ul>
            <ul class="sys-nav">
                <li class="nav-element nav-logout"><a href="{{ action("Auth\AuthController@getLogout") }}">Déconnexion</a></li>
            </ul>
        @endif
    </nav>
    @show

    <div class="content">
        @yield('content')
    </div>

    @yield('javascript')
</body>
</html>