@extends('main')

@section('title', '| Voir le Post')

@section('contenu')

    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>
            <p>Posté dans la catégorie : {{$post->category->name}}</p>
        </div>
                </div>
    </div>


@endsection