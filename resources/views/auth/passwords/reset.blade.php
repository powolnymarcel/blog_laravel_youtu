@extends('main')

@section('title', '| mot de passe oublié')

@section('contenu')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form action="{{route('password.reset')}}" method="post">
                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                        <input type="hidden" value="{{$token}}" name="token">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$email}}"  >
                        </div>
                        <div class="form-group">
                            <label for="password">Nouveau password</label>
                            <input type="password" name="password" id="password" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Nouveau password confi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Reset">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection