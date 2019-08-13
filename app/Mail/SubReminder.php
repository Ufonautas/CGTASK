<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubReminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($planName, $planID)
    {
        $this->planName = $planName;
        $this->planID = $planID;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = array(
            'planName' => $this->planName,
            'prodID' => $this->planID,
        );
        return $this->view('mails.subreminder')->with('data', $data);
    }
}
