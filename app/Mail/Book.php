<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Book extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $firstname;
    public $lastname;
    public $phone;
    public $idno;
    public $ticketno;
    public $total;
    public $mode;
    public $startdate;
    public $enddate;
    public $types;
    public $nums;
    public $amounts;
    public $diffDays;

    public function __construct($types,$nums,$amounts,$startdate,$enddate,$firstname,$lastname,$idno,$phone,$ticketno,$total,$mode,$diffDays)
    {
        //
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->phone     = $phone;
        $this->idno      = $idno;
        $this->ticketno  = $ticketno;
        $this->total     = $total;
        $this->mode      = $mode;
        $this->startdate = $startdate;
        $this->enddate   = $enddate;
        $this->types     = $types;
        $this->nums      = $nums;
        $this->amounts   = $amounts;
        $this->diffDays  = $diffDays;
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
                    ->view('emails.booking');
    }
}
