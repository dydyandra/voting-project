<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($count)
    {
        $this->count = $count;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $dt = Carbon::now(); 
        return $this->view('emails.registeredcount', [
            "date" => $dt->toDateString() // Equivalent: echo $dt->format('Y-m-d');

    ]);
    }
}