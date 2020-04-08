<?php


namespace App\Services\Message;

use App\Services\Exceptions\MessageException;
use App\Services\Message;

class Fake implements Message
{
    public function send(string $to, string $body)
    {
        if ($to === '+1111') {
            return 'SID';
        } else {
            throw new MessageException();
        }
    }
}
