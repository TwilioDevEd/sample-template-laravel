<?php


namespace App\Services;

use App\Services\Exceptions\MessageException;

interface Message
{
    /**
     * Send an SMS with with the supplied body
     * @param string $to
     * @param string $body
     * @return string
     * @throws MessageException
     */
    public function send(string $to, string $body);
}
