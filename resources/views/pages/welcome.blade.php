@extends('main')
@section('tiitle', '| Accueil')
@section('stylesheet')
@endsection
@section('contenu')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Hello, world!</h1>
                <p>...</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body,0,300)}} {{strlen($post->body)>300 ? "..." : "" }}</p>
                    <a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Lire</a>
                </div>
                <hr>
            @endforeach

        </div>
        <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
        </div>
    </div>

    <div class="well">
        @if(\Illuminate\Support\Facades\Auth::user())
        {{\Illuminate\Support\Facades\Auth::user()}}
        @endif
    </div>
@endsection
@section('scripts')
@endsection