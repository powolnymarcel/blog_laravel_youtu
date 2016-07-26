@extends('main')

@section('title', '| Toute les Categories')

@section('contenu')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of .col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                <form action="{{route('categories.store')}}" method="post">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{Request::old('name')}}" >
                    </div>
                    <input type="submit" value="Creer" class="btn btn-lg btn-block btn-primary"  >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                </form>

            </div>
        </div>
    </div>

@endsection