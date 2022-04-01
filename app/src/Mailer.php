<?php

namespace App;

class Mailer
{
    public function sendMessage($email, string $message): bool
    {
        if (empty($email)) {
            throw new \Exception('empty');
        }

        echo "send '$message' to '$email'";

        return true;
    }

    public static function send($email, string $message): bool
    {
        if (empty($email)) {
            throw new \Exception('empty');
        }

        echo "send '$message' to '$email'";

        return true;
    }
}