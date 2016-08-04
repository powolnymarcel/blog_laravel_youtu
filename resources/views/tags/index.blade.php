@extends('main')

@section('title', '| tous les  Tags')

@section('contenu')

	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-3">
			<div class="well">
				<form action="{{route('tags.store')}}" method="post">
					<div class="form-group">
						<label for="name">nom</label>
						<input type="text" name="name" id="name" class="form-control" value="{{Request::old('name')}}" >
					</div>
					<input type="submit" value="Creer" class="btn btn-lg btn-block btn-primary"  >
					<input type="hidden" name="_token" value="{{csrf_token()}}">

				</form>
			</div>
		</div>
	</div>

@endsection