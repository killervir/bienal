<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Get the route key for the model.
 *
 * @return string
 */
class actividades extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $table = 'actividades';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'fecha_hora',
        'usuarios_id',
        'imagen',
        'link_facebook',
        'status',
        'created_at',
		'updated_at',
    ];
}
