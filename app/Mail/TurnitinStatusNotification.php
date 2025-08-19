<?php

namespace App\Mail;

use App\Models\turnitin_requests;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TurnitinStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $turnitinRequest;
    public $type;

    public function __construct(turnitin_requests $turnitinRequest, $type)
    {
        $this->turnitinRequest = $turnitinRequest;
        $this->type = $type;
    }

    public function build()
    {
        if ($this->type === 'new_request') {
            return $this->subject('Permintaan Turnitin Baru - ' . $this->turnitinRequest->nama)
                ->view('emails.turnitin.new_request');
        } else {
            return $this->subject('Update Status Turnitin - ' . $this->turnitinRequest->judul_naskah)
                ->view('emails.turnitin.status_update');
        }
    }
}
