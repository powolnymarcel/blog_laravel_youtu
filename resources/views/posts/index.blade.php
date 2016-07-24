@extends('main')

@section('title', '| Tous les Posts')

@section('contenu')

    <div class="row">
        <div class="col-md-10">
            <h1>Tous les Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Créer u!n nouveau post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!-- end of .row -->

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Titre</th>
                <th>Message</th>
                <th>Crée le</th>
                <th></th>
                </thead>

                <tbody>

                @foreach ($posts as $post)

                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                        <td>{{ date('j M, Y', strtotime($post->created_at)) }}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">Voir</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Editer</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>


        </div>
    </div>

@stop