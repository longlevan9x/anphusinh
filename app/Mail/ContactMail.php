<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
	use Queueable, SerializesModels;

	public $name;
	public $phone;
	public $question;

	/**
	 * Create a new message instance.
	 * @param $name
	 * @param $phone
	 * @param $question
	 */
	public function __construct($name, $phone, $question) {
		$this->name     = $name;
		$this->phone    = $phone;
		$this->question = $question;
	}

	/**
	 * Build the message.
	 * @return $this
	 * @throws \Exception
	 */
	public function build() {
		return $this->subject("Tin nhắn nhận liên hệ từ: " . $this->name)->from(setting(KEY_ADMIN_EMAIL) ?? config('mail.username'))->view("mailer.contact")->text("mailer.contact-text");
	}
}
