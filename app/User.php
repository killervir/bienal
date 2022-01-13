<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function getRouteKeyName()
    {
        return 'username';
    }
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'username', 'id_registro'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany(rol::class, 'roles_asignados','id_usuario','id_rol' );
    }

    public function hasRoles(array $roles)
    {   
            
            foreach ($roles as $role) 
            {
                
                foreach($this->roles as $userRole)
                {
                    
                    if($userRole->id === (int)$role)
                    {
                        return TRUE;
                    }

                }
            }
            return FALSE;
    }
     
}
