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

    <div class="content">
        @yield('content')
    </div>

    @yield('javascript')
</body>
</html>