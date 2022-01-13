<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class integrantes extends Model
{
     protected $table = 'integrantes_colectivos';
     protected $primaryKey = 'id';
     protected $fillable =[
     	'id_registro',
     	'integrante',
     	
     ];
}
