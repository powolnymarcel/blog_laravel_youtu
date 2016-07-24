@extends('main')

@section('title', '| Voir le Post')

@section('contenu')

    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Créé le:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Mis à jour le:</dt>
                    <dd>{{date('j M, Y H:i',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6"><a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-primary btn-block">Editer</a></div>
                    <div class="col-sm-6"><a href="{{route('posts.destroy',['id'=>$post->id])}}" class="btn btn-danger btn-block">Supprimer</a></div>
                </div>
            </div>
        </div>
    </div>

    @endsection