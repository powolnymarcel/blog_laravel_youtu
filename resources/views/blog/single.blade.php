@extends('main')
<?php $titrepagechapee =htmlspecialchars($post->title); ?>
@section('title', "| $titrepagechapee")

@section('contenu')

    <div class="row">
        <div class="col-md-8">
            @if($post->image)
                <img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />


            @endif
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>
            <p>Posté dans la catégorie : {{$post->category->name}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->commentaires()->count() }} Commentaires</h3>
            @foreach($post->commentaires as $comment)
                <div class="comment">
                    <div class="author-info">

                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                        </div>

                    </div>

                    <div class="comment-content">
                        {{ $comment->commentaire }}
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            <form action="{{route('commentaires.store', [$post->id])}}" method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{Request::old('name')}}" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{Request::old('email')}}" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="commentaire">commentaire</label>
                        <textarea name="commentaire" id="" cols="30"  class="form-control" rows="4">{{Request::old('commentaire')}}</textarea>
                    </div>
                </div>




                <input type="submit" value="Creer" class="btn btn-lg btn-block btn-primary"  >
                <input type="hidden" name="_token" value="{{csrf_token()}}">


            </form>

        </div>
    </div>

@endsection