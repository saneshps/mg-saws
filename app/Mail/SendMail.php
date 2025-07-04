<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Config;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

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
        //   return $this->view('dynamic_email_template')->with('data', $this->data);

        return $this->from(Config::get('mail.from.address'))
            ->subject('Customer Enquiry - MG')
            ->view('dynamic_email_template')
            ->with('data', $this->data);
    }
}
