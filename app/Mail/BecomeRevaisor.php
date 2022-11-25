<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BecomeRevaisor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $whyWork;

    public function __construct(User $user, $whyWork)
    {
        $this->user =$user;
        $this->whyWork = $whyWork;
    }

    public function build(){
        return $this->from('presto.admin@noreply.it')->view('mail.become_revaisor');
    }
}
