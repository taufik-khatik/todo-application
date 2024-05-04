<?php

namespace App\Mail;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnassignNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $todo;
    public $previousAssignedUser;

    /**
     * Create a new message instance.
     */
    public function __construct(Todo $todo, User $previousAssignedUser)
    {
        $this->todo = $todo;
        $this->previousAssignedUser = $previousAssignedUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Task Unassigned')->view('emails.unassign_notification');
    }
}
