<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Genera un enlace firmado temporalmente que expira en 15 minutos,
        // apunta a la ruta 'verification.verify' y contiene el ID del usuario y un hash del email
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',                                // Nombre de la ruta de verificación
            Carbon::now()->addMinutes(15),                         // Tiempo de expiración del enlace (15 min desde ahora)
            [
                'id' => $notifiable->getKey(),                     // Obtiene el ID del usuario (clave primaria)
                'hash' => sha1($notifiable->getEmailForVerification()) // Genera un hash del email del usuario para seguridad
            ]
        );

        // Crea un objeto MailMessage que contiene el contenido del correo
        return (new MailMessage)
            ->subject('Verifica tu correo electrónico')               // Asunto del correo
            ->greeting('Hola ' . $notifiable->name . ' 👋')          // Saludo personalizado con el nombre del usuario
            ->line('Gracias por registrarte. Para continuar, verifica tu correo haciendo clic en el botón abajo.')
            // Línea explicando el motivo del correo
            ->action('Verificar correo', $verificationUrl)           // Botón de acción con el enlace de verificación
            ->line('Si no creaste una cuenta, puedes ignorar este mensaje.');
        // Mensaje de advertencia en caso de que el usuario no haya solicitado registro
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
