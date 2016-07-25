@extends('main')

@section('title', '| Mot de passe oublié')

@section('contenu')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{route('password.email')}}" method="post">
                            <input type="hidden" value="{{csrf_token()}}" name="_token">

                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" name="email" id="email" class="form-control"  >
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
