<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
       // return $this->belongsToMany('App\Post','nom_de_la_table','tag_id','post_id');
        return $this->belongsToMany('App\Post');
    }
}
