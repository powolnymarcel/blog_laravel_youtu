@extends('main')

@section('title', '| Blog')

@section('contenu')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{ $post->title }}</h2>
                <img src="{{asset('/images/' . $post->image_miniature)}}" width="200" height="100" />
                <h5>Publié le: {{ date('j M, Y', strtotime($post->created_at)) }}</h5>

                <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Lire plus</a>
                <hr>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>


@endsection