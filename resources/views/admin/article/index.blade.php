@extends('admin.app')

@section('content')
    <h1>Liste des articles</h1>


    <table class="article-list">
        <thead>
            <tr>
                <td>Article</td>
                <td>Disponibilité</td>
                <td>Date de publication</td>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>
                        <a href="{{ action("AdminArticleController@edit", $article->id) }}">
                            {{ $article->title }}
                        </a>
                    </td>
                    <td>
                        @if($article->available)
                            Publié - en ligne
                        @elseif($article->published)
                            Publié - prochainement en ligne
                        @else
                            Pas publié
                        @endif
                    </td>
                    <td>
                        {{ $article->published_at->diffForHumans() }} ({{ $article->published_at }})
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <a href="{{ action("AdminArticleController@create") }}" class="button-link">Nouvel article</a>
                </td>
            </tr>
        </tfoot>
    </table>

@endsection

@section("style")
    {!! HTML::style("css/admin/article.css") !!}
@endsection