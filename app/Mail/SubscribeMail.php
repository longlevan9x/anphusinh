<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;

	public $name;
	public $phone;

	/**
	 * Create a new message instance.
	 * @param $name
	 * @param $phone
	 */
	public function __construct($name, $phone) {
		$this->name     = $name;
		$this->phone    = $phone;
	}

	/**
	 * Build the message.
	 * @return $this
	 * @throws \Exception
	 */
	public function build() {
		return $this->subject("Tin nhắn nhận tư vấn từ: " . $this->name)->from(setting(KEY_ADMIN_EMAIL) ?? config('mail.username'))->view("mailer.subscribe")->text("mailer.subscribe-text");
	}
}
