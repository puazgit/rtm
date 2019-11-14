<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateRtmEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('i.apriyampon@gmail.com')
            ->view('rtm/email')
            ->with(
                [
                    'nama' => 'Puas Apriyampon',
                    'website' => 'www.jasatirta2.co.id',
                ]
            );
    }
}