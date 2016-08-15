@extends('main')

@section('title','| creer un nouveau post')

@section('stylesheet')
    <link rel="stylesheet" href="{{URL::asset('css/select2.min.css')}}">
    <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
@endsection
@section('contenu')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Creer un nouveau post</h1>
        <hr>
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" >

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{Request::old('title')}}" >
            </div>
            <div class="form-group">
                <label for="body">Message</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{Request::old('body')}}</textarea>
            </div>

            <div class="form-group">
                <label for="category">Categorie</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control js-example-basic-multiple" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" accept="image/*" name="image" id="image">
            </div>


            <input type="hidden" value="{{ Session::token() }}" name="_token">
            <input type="submit" value="envoyer" class="btn btn-lg btn-block btn-primary"  >
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
    </script>
@endsection
