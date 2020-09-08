<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdMessage extends Notification
{
    use Queueable;


    protected $article;

    /**
     * The message.
     *
     * @var String
     */
    protected $message;

    /**
     * The email.
     *
     * @var String
     */
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Ad  $ad
     * @param String  $message
     * @param String  $email
     * @return void
     */
    public function __construct($article,  $message, $email)
    {
        $this->article = $article;
        $this->message = $message;
        $this->email = $email;
      
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
                    ->line("Un amateur de la cuisine vous a enoyé un message voici son email : . $this->email , si vous souhaitrez le contacter pour plus de precisions :")
                    ->line('--------------------------------------')
                    ->line($this->message)
                    ->line('--------------------------------------')
                    ->action('Retourner sur le site', url('/')) 
                    ->line("Merci d'utiliser notre site pour vos annonces !");
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
