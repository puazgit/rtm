<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
// use App\Rtm;

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
        // $rtmcUrl = $this->request->getMedia('document');
        // $rtmcUrl = $rtmcUrl[0]->getFullUrl();
        return $this->from('rtm.pjt2@gmail.com')
            ->subject('(hanya test) Sistem Informasi Rapat Tinjauan Manajemen (SI RTM)')
            ->view('rtm/email')
            ->with(
                [
                    // 'rtmUrl' => $rtmcUrl,
                    'request' => $this->request]);
    }
}
