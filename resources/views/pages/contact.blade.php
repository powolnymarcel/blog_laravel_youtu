@extends('main')
@section('tiitle', '| Conttact')

@section('contenu')
    <div class="row">
        <div class="col-md-12">
            <h1>Contactez nous</h1>
            <hr>
            <form action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sujet">Sujet:</label>
                    <input type="text" id="sujet" name="sujet" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">message:</label>
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10">regreth</textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="envoyer">
                </div>

            </form>
        </div>
    </div>
    @endsection