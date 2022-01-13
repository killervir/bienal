<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'catNombre'
    ];

    public function register()
    {
        return $this->hasMany(registro::class, 'categorias');
    }

    /*public function registro()
    {
        return $this->belongsTo(App\registro::class, 'categorias');
    }*/
}
