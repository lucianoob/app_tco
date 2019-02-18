<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SupplierActivate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param $supplier
     * @return void
     */
    public function __construct($supplier)
    {
        $this->supplier = $supplier;
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
            ->subject('Ativação do Cadastro!')
            ->greeting(sprintf('Hi, %s', $this->supplier->name))
            ->line('Você foi cadastrado com sucesso no sistema AppTCO. Clique no link abaixo para ativar seu cadastro.')
            ->action('Ativar', route('suppliers.activate', [$this->supplier->token]))
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