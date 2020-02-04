<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendVoterConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $url;

    public function __construct($name, $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    public function build()
    {
        return $this->from('ra@ivub.com', 'Registration Authority')
            ->subject('Voter Confirmation')
            ->markdown('mails.voter')
            ->with([
                'name' => $this->name,
                'link' => $this->url
            ]);

//        return $this->view('view.name');
    }
}
