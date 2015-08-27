<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    @section('metadata')
        <title>Quentin.ninja - Développeur, Gamer et Otaku</title>
    @show
    {!! HTML::style("css/app.css") !!}
    @yield('style')
</head>
<body>

@section('nav')
    <nav class="main-nav">
        <div class="title"><a href="{{ url("/") }}">Quentin.ninja</a></div>
        <div>Développeur, Gamer et Otaku</div>
    </nav>
@show

<div class="content">
    @yield('content')
</div>

@yield('javascript')
</body>
</html>