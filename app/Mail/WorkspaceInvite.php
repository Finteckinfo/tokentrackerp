<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkspaceInvite extends Mailable
{
    use Queueable, SerializesModels;

    public $inviteLink;
    public $expirationDate;

    public function __construct($inviteLink, $expirationDate)
    {
        $this->inviteLink = $inviteLink;
        $this->expirationDate = $expirationDate;
    }

    public function build()
    {
        return $this->subject('You are invited to join a workspace')
                    ->view('emails.workspaceInvite')
                    ->with([
                        'inviteLink' => $this->inviteLink,
                        'expirationDate' => $this->expirationDate,
                    ]);
    }
}
