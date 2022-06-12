<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user = [];

    /**
     * Create a new message instance.
     * On l'utilisera pour passer differentes informations comme l'utilisateur ou l'URL en cours
     *
     * @return void
     */
    public function __construct(array $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     * Nous retourne une vues pour le rendus de notre mail
     *
     * @return $this
     */
    public function build()
    {
        // Il faut preciser le sendeur ie celui qui envois le mail avec "from"
        return $this->from('arickbulakali@bongobtrust.org')
            ->subject('Bongob Trust Report of ' . $this->user['date'])
            ->view('emails.report');

        // Maintenant pour envoyer  le mail on doit le faire dans le controller adapter pour cela et dans ce contoller il faudra utiliser la facade mail
    }
}
