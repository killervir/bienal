<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $folio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $folio)
    {
        $this->email = $email;
        $this->name = $name;
        $this->folio = $folio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bienaldefotografia@cultura.gob.mx','Centro de la Imagen')
                    ->subject('Registro exitoso – XIX Bienal de Fotografía 2021')
                    ->bcc(['bienaldefotografia@cultura.gob.mx'])
                    
                    ->view('emails.bienal');
    }
}
