<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table='rols';
    protected $primaryKey='id';
    protected $fillable=[
    	''
    ];

    public function users()
    {
        return $this
            ->belongsToMany('App\User')->using('roles_asignados');
            
    }


}
