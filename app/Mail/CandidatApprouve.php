<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatApprouve extends Mailable
{
    use Queueable, SerializesModels;

    public $candidat;

    public function __construct($candidat)
    {
        $this->candidat = $candidat;
    }

    public function build()
    {
        return $this->subject('Félicitations pour votre admission !')
                    ->markdown('emails.candidats.approuve');
    }
}
