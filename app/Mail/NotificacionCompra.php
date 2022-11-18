<?php

namespace App\Mail;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionCompra extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $compra;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Compra $compra)
    {
        $this->usuario = $user;
        $this->compra = $compra;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('correos/notifica');
    }
}
