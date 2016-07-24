@extends('main')

@section('title', '| Voir le Post')

@section('contenu')

    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    @endsection