<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatDecline extends Mailable
{
    use Queueable, SerializesModels;

    public $candidat;

    public function __construct($candidat)
    {
        $this->candidat = $candidat;
    }

    public function build()
    {
        return $this->subject('Réponse à votre candidature')
                    ->markdown('emails.candidats.decline');
    }
}
