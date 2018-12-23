<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->url = url('/');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->from('example@example.com')
//            ->view('emails.index') ->with([
//                'name' => $this->name,
//                'url' => $this->url
//            ]);

        $address = 'janeexampexample@example.com';
        $subject = 'This is a demo!';
        $name = 'Jane Doe';

        return $this->view('emails.index')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with([ 'name' => $this->name,
                'url' => $this->url ]);
    }
}
