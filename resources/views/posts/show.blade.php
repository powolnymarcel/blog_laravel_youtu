@extends('main')

@section('title', '| Voir le Post')

@section('contenu')

    <div class="row">
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>

            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Commentaires <small>{{ $post->commentaires()->count() }} total</small></h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Commentaire</th>
                        <th width="70px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($post->commentaires as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->commentaire }}</td>
                            <td>
                                <a href="{{ route('commentaires.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil">Editer</span></a>
                                <a href="{{ route('commentaires.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Supprimer</span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

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
                <dl class="dl-horizontal">
                    <dt>Slug:</dt>
                    <dd><a href="{{(route('blog.single',$post->slug))}}">{{($post->slug)}}</a></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Categorie:</dt>
                    <dd>{{($post->category->name)}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6"><a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-primary btn-block">Editer</a></div>
                    <div class="col-sm-6">
                        <form action="{{route('posts.destroy',['id'=>$post->id])}}" method="post">

                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" value="{{ Session::token() }}" name="_token">
                            <input type="submit" value="Supprimer" class="btn btn-danger btn-block">

                        </form>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <a href="{{route('posts.index')}}" class="btn btn-block btn-lg btn-default"> << Voir les autres posts</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @endsection