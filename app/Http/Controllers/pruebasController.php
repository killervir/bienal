<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class pruebasController extends Controller
{
	public function __construct()
    {   
        $this->middleware('roles:1')->only('prueba');        
    }
    public function pruebas()
    {
        //dd(auth()->user()->hasRoles([9]));
    	return view('pruebas.pruebas');
    }
}
