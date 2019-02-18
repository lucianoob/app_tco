<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserActivate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('master@apptco.com')
            ->subject('Ativação da Conta!')
            ->greeting(sprintf('Hi, %s', $this->user->name))
            ->line('Sua conta foi criada com sucesso. Clique no link abaixo para ativar a sua conta.')
            ->action('Ativar', route('activate', [$this->user->token]))
            ->line('Obrigado por usar o nosso app!');
    }

    /**
     * Get the array representation of the notification.
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