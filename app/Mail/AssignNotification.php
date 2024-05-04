<?php

namespace App\Mail;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $todo;
    public $assignedUser;

    /**
     * Create a new message instance.
     */
    public function __construct(Todo $todo, User $assignedUser)
    {
        $this->todo = $todo;
        $this->assignedUser = $assignedUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Task Assigned')->view('emails.assign_notification');
    }
}
