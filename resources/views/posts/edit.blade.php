@extends('main')

@section('title', '| Editer le Post')


@section('stylesheet')
    <link rel="stylesheet" href="{{URL::asset('css/select2.min.css')}}">
    <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>@endsection

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
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control js-example-basic-multiple" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Categorie</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($post->category_id == $category->id)
                            selected
                                    @endif>{{$category->name}}</option>
                        @endforeach
                    </select>

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
@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
        $('.js-example-basic-multiple').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    </script>
@endsection

