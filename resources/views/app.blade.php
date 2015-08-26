<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    @section('metadata')
        <title>Blog</title>
    @show
    {!! HTML::style("css/app.css") !!}
    @yield('style')
</head>
<body>

@section('nav')
    <nav class="main-nav">
        <div class="nav-element"><span class="title">Blog</span></div>
    </nav>
@show

<div class="content">
    @yield('content')
</div>

@yield('javascript')
</body>
</html>