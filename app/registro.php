<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
	public function getRouteKeyName()
	{
		return 'folio';
	}



	public function categoriaRelacionada()
	{
		return $this->belongsTo(categorias::class, 'categorias');
	}


	protected $table = 'registro';
	protected $primaryKey = 'id';
	protected $fillable = [
		'status',
		'tipoPostulacion',
		'categorias', //Llave foránea, representa al id del catálogo
		'folio',
		'id_convocatoria',
		'tipoPostulacion',
		'usuarioTemporal',
		'contrasenia',
		'nombre',
		'apellidoPaterno',
		'apellidoMaterno',
		'nombreArtistico',
		'nombreColectivo',
		'fechaNacimiento',
		'id_nacionalidad', // Llave foránea, representa al id del catálogo de nacionalidades.
		'lugarResidencia',
		'email',
		'telefono',
		'extension',
		'semblanza',
		'documentosPersonales',
		'disciplina',
		'tituloProyecto',
		'anoRealizacion',
		'descripcionProyecto',
		'adjuntarProyecto',
		'bases',
		'verificacion',
		'motivo',
		'otro_motivo',
		'privacidad',
		'created_at',
		'updated_at',
	];
}
