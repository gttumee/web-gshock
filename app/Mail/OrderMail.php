<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email,$ordernumber,$allprice,$watchName,$quanity)
    {
        $this->name = $name;
        $this->email = $email;
        $this->ordernumber = $ordernumber;
        $this->allprice = $allprice;
        $this->watchName = $watchName;
        $this->quanity = $quanity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject('G-shock.mn')
            ->view('ordermail')
            ->with([
                'name' => $this->name,
                'ordernumber' => $this->ordernumber,
                'allprice' => $this->allprice,
                'watchName' => $this->watchName,
                'quanity' => $this->quanity,
            ]);
    }
    }