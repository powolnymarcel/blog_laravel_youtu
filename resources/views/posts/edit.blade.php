@extends('main')

@section('title', '| Editer le Post')


@section('contenu')

    <div class="row">
        <form action="{{route('posts.update',['id'=>$post->id])}}" method="post">
            <div class="col-md-8">

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
            </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{$post->slug}}">
                </div>

                <div class="form-group">
                <label for="body">Message</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
            </div>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
            <input type="submit" value="envoyer" class="btn btn-lg btn-block btn-primary">
            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Cree le :</dt>
                        <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Mis à jour le :</dt>
                        <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                </div>
            </div>
            <input type="hidden" name="_method" value="put" />

        </form>
    </div>	<!-- end of .row (form) -->

@stop
