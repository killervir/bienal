<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Get the route key for the model.
 *
 * @return string
 */

class prensa extends Model
{
	public function getRouteKeyName()
	{
	    return 'slug';
	}
    protected $table = 'prensas';
	protected $primaryKey = 'id';
	protected $fillable =[
		'titulo',
		'slug',
		'subtitulo',
		'descripcion',
		'imagen',
		'link_kit',
		'fecha_publica',
		'usuarios_id',
		'created_at',
		'updated_at',
	];
}
