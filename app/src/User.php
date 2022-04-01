<?php

namespace App;

use App\Mailer;

class User extends AbstractPerson
{
    public $firstname;

    public $lastname;

    public $email;

    protected $mailer;

    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }

    protected function getTitle(): string
    {
        return 'M.';
    }

    public function getFullName(): string
    {
        return trim("$this->firstname $this->lastname");
    }

    public function notify(string $message): bool
    {
        if (empty($message)) {
            throw new \Exception('Empty message');
        }

        return $this->mailer->sendMessage($this->email, $message);
    }
}
