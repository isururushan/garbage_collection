<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_id;
    public $name;
    public $telephone;
    public $email;
    public $destination;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inserted_id, $name, $telephone, $email, $destination)
    {
        $this->contact_id = $inserted_id;
        $this->name = $name;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->destination = $destination;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seasonal Travels - Contact Mail')->view('contactMail');
    }
}
