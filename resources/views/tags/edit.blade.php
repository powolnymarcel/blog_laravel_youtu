@extends('main')

@section('title', "| Editer Tag")

@section('contenu')
	


	<form action="{{route('tags.update',['id'=>$tag->id])}}" method="post">

			<div class="form-group">
				<label for="name">Titre</label>
				<input type="text" name="name" id="name" class="form-control" value="{{$tag->name}}">
			</div>

			<input type="hidden" value="{{ Session::token() }}" name="_token">
			<input type="submit" value="envoyer" class="btn btn-lg btn-block btn-primary">
		<input type="hidden" name="_method" value="put" />

	</form>

@endsection