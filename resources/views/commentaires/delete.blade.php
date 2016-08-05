@extends('main')

@section('title', '| Suppression commentaire')

@section('contenu')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Supprimer le commentaire?</h1>
            <p>
                <strong>Nom:</strong> {{ $comment->name }}<br>
                <strong>Email:</strong> {{ $comment->email }}<br>
                <strong>Commentaire:</strong> {{ $comment->commentaire }}
            </p>


            <form action="{{route('commentaires.destroy',[$comment->id])}}" method="post">
                <input type="submit" value="Supprimer ?!">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="hidden" name="_method" value="DELETE">
            </form>
        </div>
    </div>

@endsection