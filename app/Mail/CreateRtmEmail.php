<?php

namespace App\Mail;

use Illuminate\Http\Request;
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
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rtm.pjt2@gmail.com')
            ->subject('Pembertahuan untuk melakukan input bahan RTM')
            ->view('rtm/email')
            ->with(
                [
                    'judul' => ' Input Bahan RTM',
                    // 'rtmke' => $rtmke,
                    'request' => $this->request
                ]
            );
    }
}
