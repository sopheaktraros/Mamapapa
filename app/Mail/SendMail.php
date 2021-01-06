<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    private  $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = request();

        return $this->subject(" Customer inquiry from website")
            ->from($request->email, $request->name)
            ->view('website.email')->with('data',$this->data);
    }
}
