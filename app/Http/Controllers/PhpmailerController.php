<?php

namespace App\Http\Controllers;

use Request;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
#use PHPMailer\PHPMailer\SMTP;
use App\registro;


class PhpmailerController extends Controller {

    public function index()
    {

    }
    public function enviarCorreo($folio = 'BIE206PHBT1WE')
    {
        
        $correo=registro::where('folio','=',$folio)->get();
		//dd($correo);
        $emailUsuario=$correo[0]->email;
        $name = $correo[0]->nombre.' '.$correo[0]->apellidoPaterno;
		
        $mensaje = '<div style="text-align: center">';
        $mensaje.='<h1>Buenas tardes <strong>'.$name.'</strong> </h1>';
        $mensaje.='<p>Su registro a la 19 Bienal de Fotografía se concluyó correctamente.</p>';
        $mensaje.='<p>Su número de folio es: <strong>'.$folio.'</strong> </p>';
        $mensaje.='<p>Los resultados se publicarán en el sitio oficial de la Bienal: http://bienaldefotografia.com.mx</p>';
        $mensaje.='</div>';
		//echo $mensaje; die;
        $mail = new PHPMailer(true);
        try{
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//$mail->SMTPDebug = 2; //Alternative to above constant
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->SMTPAuth =true;
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Host = env('MAIL_HOST'); //gmail has host > smtp.gmail.com
            $mail->Port = env('MAIL_PORT'); //gmail has port > 587 . without double quotes
            $mail->Username = env('MAIL_USERNAME'); //your username. actually your email
            $mail->Password = env('MAIL_PASSWORD'); // your password. your mail password
            $mail->setFrom('aamador@cultura.gob.mx', 'Bienal de fotografía');
            $mail->Subject = 'Bienal de Fotografía';//$request->subject;
            //$mail->MsgHTML($request->text);
            $mail->MsgHTML($mensaje);
            $mail->addAddress($emailUsuario , $name);
            $mail->addBCC('aamador@cultura.gob.mx');
            $mail->send();
			//var_dump($mail-send()); die;
        }catch(phpmailerException $e){
            dd($e);
        }catch(Exception $e){
            dd($e);
        }
        if($mail){
            //echo "Exitosamente";
            return view('bienal_web.registrado',[
                'folio'=>$folio,
            ]);
            //return View("result")->with("result","success")->with("title","Success");
        }else{
            echo "Rechazo";
            //return View("result")->with("result","failed")->with("title","Failed");
        }
    }
    public function sendEmail () {
        // is method a POST ?
        //if(Request::isMethod('post')) {
            require 'vendor/autoload.php';													// load Composer's autoloader

            $mail = new PHPMailer(true);                            // Passing `true` enables exceptions
        //dd($mail)
            try {
                // Server settings
                $mail->SMTPDebug = 0;                                	// Enable verbose debug output
                $mail->isSMTP();                                     	// Set mailer to use SMTP
                $mail->Host = 'smtp.office365.com';												// Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                              	// Enable SMTP authentication
                $mail->Username = 'aamador@cultura.gob.mx';             // SMTP username
                $mail->Password = '#Aada830320#,';              // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('aamador@cultura.gob.mx', 'Mailer');
                $mail->addAddress('anngell2000@hotmail.com', 'Optional name');	// Add a recipient, Name is optional
                $mail->addReplyTo('aamador@cultura.gob.mx', 'Mailer');
                //$mail->addCC('his-her-email@gmail.com');
                //$mail->addBCC('his-her-email@gmail.com');

                //Attachments (optional)
                // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

                //Content
                $mail->isHTML(true); 																	// Set email format to HTML
                $mail->Subject = 'prueba';//Request::input('subject');
                $mail->Body    = 'prueba';//Request::input('message');						// message

                $mail->send();
                return back()->with('success','Message has been sent!');
            } catch (Exception $e) {
                return back()->with('error','Message could not be sent.');
            }
        //}
        //return view('emails.phpmailer');
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request){

    }
}
