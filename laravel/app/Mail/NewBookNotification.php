<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBookNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function build()
    {
        return $this->markdown('emails.new-book-notification', [
            'book' => $this->book,
        ]);
    }
}
