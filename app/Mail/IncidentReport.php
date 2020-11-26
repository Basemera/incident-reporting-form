<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IncidentReport extends Mailable
{
    use Queueable, SerializesModels;
    protected $file;
    protected $product;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file, $product)
    {
        //
        $this->file = $file;
        $this->product = $product;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bsmrrachel@gmail.com')
                    ->view('emails.name')->with('product', $this->product)
                    ->attach(base_path('reports/'.$this->file . '.pdf'),
                    [
                        'as' => $this->file . '.pdf',
                        'mime' => 'application/pdf',
                    ]
                );
    }
}
