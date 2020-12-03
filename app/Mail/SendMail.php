<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable {
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details = []) {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        if ($this->details['file']) {
            return $this->subject('Mail From ABC Company')
                ->view('admin.mail.sendmail')
                ->attach($this->details['file']->getRealPath(), // get file path
                    [
                        'as'   => $this->details['file']->getClientOriginalName(), // get file original name
                        'mime' => $this->details['file']->getClientMimeType(), // get file type
                    ]);
        } else { // if user send mail without attachment
            return $this->subject('Mail From ABC Company')
                ->view('admin.mail.sendmail');
        }
    }
}
