@extends('main')

@section('title', '| Register')

@section('contenu')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{route('register.post')}}" method="post">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{Request::old('name')}}" >
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{Request::old('email')}}" >
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="password_confirmation">password confi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  >
                </div>
                <div class="form-group">
                    <input type="submit" value="Inscrption">
                </div>
                <input type="hidden" value="{{ Session::token() }}" name="_token">

            </form>
        </div>
    </div>

@endsection