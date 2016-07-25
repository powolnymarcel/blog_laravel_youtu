@extends('main')

@section('title', '| Login')

@section('contenu')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form action="{{route('login.post')}}" method="post">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{Request::old('email')}}" >
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control"  >
                </div>

                <div class="form-group">
                <input type="checkbox" name="remember" value="remember"> remember moi ?<br>
                </div>
                <div class="form-group">
                    <input type="submit" value="connexion">
                </div>
                <p><a href="{{ url('password/reset') }}">Forgot My Password</a>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">

            </form>

        </div>
    </div>

@endsection
