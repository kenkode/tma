<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookVehicle extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $date;
    public $time;
    public $paymentmode;
    public $amount;
    public $seat;
    public $vehicle;
    public $firstname;
    public $lastname;
    public $idno;
    public $phone;
    public $ticketno;
    

    public function __construct($date,$time,$paymentmode,$amount,$seat,$vehicle,$firstname,$lastname,$idno,$phone,$ticketno)
    {
        $this->date         = $date;
        $this->time         = $time;
        $this->paymentmode  = $paymentmode;
        $this->amount       = $amount;
        $this->seat         = $seat;
        $this->vehicle      = $vehicle;
        $this->firstname    = $firstname;
        $this->lastname     = $lastname;
        $this->idno         = $idno;
        $this->phone        = $phone;
        $this->ticketno     = $ticketno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@lixnet.net', 'TMAPP')
                    ->subject('Booking Confirmation')
                    ->view('emails.bookvehicle');
    }
}
