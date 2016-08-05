@extends('main')

@section('title', '| Editer Commentaire')

@section('contenu')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>




            <form action="{{route('commentaires.update', [$commentaire->id])}}" method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">nom</label>
                        <input type="text" name="name" id="name" disabled class="form-control" value="{{$commentaire->name}}" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" disabled class="form-control" value="{{$commentaire->email}}" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="commentaire">commentaire</label>
                        <textarea name="commentaire" id="" cols="30"  class="form-control" rows="4">{{$commentaire->commentaire}}</textarea>
                    </div>
                </div>
                <input type="submit" value="mettre à jour" class="btn btn-lg btn-block btn-primary"  >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />


            </form>
        </div>
    </div>

@endsection