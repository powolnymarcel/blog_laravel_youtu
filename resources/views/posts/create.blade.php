@extends('main')

@section('title','| creer un nouveau post')

@section('contenu')


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Creer un nouveau post</h1>
        <hr>
        <form action="{{route('posts.store')}}" method="POST">

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{Request::old('title')}}" >
            </div>
            <div class="form-group">
                <label for="body">Message</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{Request::old('body')}}</textarea>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{Request::old('slug')}}">
            </div>
            <div class="form-group">
                <label for="category">Categorie</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                </select>

            </div>



            <input type="hidden" value="{{ Session::token() }}" name="_token">
            <input type="submit" value="envoyer" class="btn btn-lg btn-block btn-primary"  >
        </form>
    </div>
</div>



    @endsection