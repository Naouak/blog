<!doctype html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    @section('metadata')
        <title>Quentin.ninja - Développeur, Gamer et Otaku</title>
    @show

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {!! HTML::style("css/app.css") !!}
    @yield('style')
</head>
<body>

@section('nav')
    <nav class="main-nav">
        <div class="title"><a href="{{ url("/") }}">Quentin.ninja</a></div>
        <div class="tagline">Développeur, Gamer et Otaku</div>
    </nav>
@show

<div class="content">
    @yield('content')
</div>

@yield('javascript')

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '{{ env('GGA_ID') }}', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>