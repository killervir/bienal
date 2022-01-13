<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
	public function getRouteKeyName()
	{
	    return 'slug';
	}
    protected $table = 'contactos';
	protected $primaryKey = 'id';
	protected $fillable =[
		'status',
		'nombre',
		'slug',
		'email',
		'descripcion',
		'telefono1',
		'extension1',
		'telefono2',
		'extension2',
		'horario',
		'direccion',
	];
}
