<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $invitationToken;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $invitationToken
     * @return void
     */
    public function __construct(User $user, $invitationToken)
    {
        $this->user = $user;
        $this->invitationToken = $invitationToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invitation to join our system')
                    ->markdown('emails.invitation')
                    ->with([
                        'userName' => $this->user->name,
                        'invitationLink' => route('register', ['token' => $this->invitationToken]),
                    ]);
    }
}
