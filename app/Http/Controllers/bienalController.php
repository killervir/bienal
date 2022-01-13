<?php

namespace App\Http\Controllers;

use App\contacto;
use App\prensa;
use App\preguntasFrecuentes;
use Illuminate\Http\Request;
use Carbon\Carbon;


class bienalController extends Controller
{
    public function index()
    {
        return view('bienal_web.home');
    }
    public function prensa()
    {
        
        $prensa=prensa::where('fecha_publica','<',Carbon::now())->where('status','=',1)->get();
 
        return view('prensa.lista',[
        'prensa'=>$prensa,
        ]);
    }
    public function prensaDetalle(prensa $prensa)
    {   $fecha=$prensa->fecha_publica;
        $rest = substr($fecha, 0, -6);
        $prensa->fecha_publica=$rest;
        return view('prensa.detalle',[
            'prensa'=>$prensa,
            
        ]);
    }
    public function preguntasFrecuentes()
    {
        $preguntasFrecuentes=preguntasFrecuentes::where('status','=',1)->get();
        return view('preguntasFrecuentes.lista',[
            'preguntasFrecuentes'=>$preguntasFrecuentes,
            // 'fecha'=>$fecha,
        ]);
    }
    public function contacto()
    {
        $contacto=contacto::where('status','=',1)->get();
        return view('contacto.lista',[
            'contacto'=>$contacto,
        ]);
    }
}
