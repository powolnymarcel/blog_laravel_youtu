<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
