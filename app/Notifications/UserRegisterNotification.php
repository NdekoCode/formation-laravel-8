<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegisterNotification extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        //
    }

    /**
     * Get the notification's delivery channels.
     *?
     *
     * @param  mixed  $notifiable Le model sur lequel on a envoyer la notification
     * @return array Va chercher à retourner la methode magique lier à l'adresse mail
     */
    public function via($notifiable)
    {
        return ['mail']; //Ici il va appeler la fonction toMail car il a la valeur 'mail'
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * ? Envois un mail uniquement
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line("{$notifiable->name} Votre compte a été créer avec succés")
            ->action('Voir les articles', url('/posts'))
            ->line('Merci d\'etre avec BongobTrust');
    }

    /**
     * Get the array representation of the notification.
     * ?La methode par defaut qui sera utiliser si l'application decide de ne pas envoyer le mail
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
