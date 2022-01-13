<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preguntasFrecuentes extends Model
{
	public function getRouteKeyName()
	{
	    return 'slug';
	}
    protected $table = 'preguntas_frecuentes';
	protected $primaryKey = 'id';
	protected $fillable=[
		'pregunta',
		'slug',
		'respuesta',
		'status',
		'convocatorias_id',
		];
}
