<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\registro;
class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($folio = 'BIE20A9YRUG6K')
    {
        $correo=registro::where('folio','=',$folio)->get();
        $emailUsuario=$correo[0]->email;
        
        
        $name = $correo[0]->nombre.' '.$correo[0]->apellidoPaterno;
        
        $data = array('name'=>$name,'folio'=>$folio);
        $template_path = 'emails.bienal';

        Mail::send(['html'=> $template_path ], $data, function($message) {
            $message->to('bienaldefotografia@cultura.gob.mx', 'Receiver Name')->subject('Titulo del correo');
            $message->from('bienaldefotografia@cultura.gob.mx','Bienal de fotografía');
        });

        return "El correo ha sido enviado";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
