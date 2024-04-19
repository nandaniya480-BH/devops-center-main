<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ProfilePods;

class ContactUs extends Mailable
{
    public $profile, $name, $email, $title, $emailMessage;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($profile, $name, $email, $title, $emailMessage)
    {
        $this->profile = $profile;
        $this->name = $name;
        $this->email = $email;
        $this->title = $title;
        $this->emailMessage = $emailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->view('blocks.mail.layout')->subject($request->subject);
    }
}
