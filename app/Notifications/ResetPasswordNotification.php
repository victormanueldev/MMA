<?php

namespace MundoMascotasApp\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    /**
   * The password reset token.
   *
   * @var string
   */
  public $token;

  /**
   * Create a notification instance.
   *
   * @param  string  $token
   * @return void
   */
  public function __construct($token)
  {
      $this->token = $token;
  }

  /**
   * Get the notification's channels.
   *
   * @param  mixed  $notifiable
   * @return array|string
   */
  public function via($notifiable)
  {
      return ['mail'];
  }

  /**
   * Build the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable)
  {
      return (new MailMessage)
          ->subject('Solicitud de restablecimiento de contraseña')
          ->greeting('Hola '.$notifiable->nombres)
          ->line('Recibiste este correo electrónico porque hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta.')
          ->action('Restablecer Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
          ->line('Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción.')
          ->salutation('¡Saludos!');
  }
}
