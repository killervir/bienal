<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $table = 'usuarios';
	protected $primaryKey = 'id';
	protected $fillable =[
		'registro_id',
		'usuarioTemporal',
		'contrasenia',
		'rol',
	];
}
