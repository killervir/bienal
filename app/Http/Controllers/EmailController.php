<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\registro;

class EmailController extends Controller
{
    public function mail()
    {
        $name = 'Angel';
        $folio = 'BIE20001';
        $email = 'bienaldefotografia@cultura.gob.mx';
        Mail::to('bienaldefotografia@cultura.gob.mx')->send(new SendMailable($email, $name, $folio));

        return 'El correo se ha enviado exitosamente';
    }

    
}
