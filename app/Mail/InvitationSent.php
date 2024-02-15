<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitationSent extends Mailable
{
    use Queueable, SerializesModels;

    public $confirmation_code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($codiceuser)
    {
        //$this->confirmation_code = $codiceuser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@goldweb.it')
                    ->view('mails.invitation')
                    ->subject('Invitation');
                    //->with(['confirmation_code', $this->confirmation_code]);
    }
}
