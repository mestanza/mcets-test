<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    // public $timestamps = false;
    protected $table = 'grupo';
    protected $fillable = [
        'id', 'nombre', 'created_at', 'updated_at'
    ];


    public function usuario()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
