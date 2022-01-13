<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rolesAsignados extends Model
{
    protected $table = 'roles_asignados';
	protected $fillable =[
		'id_usuario',
		'id_rol',
	];
	public $timestamps = false;
}
