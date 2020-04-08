<?php


namespace App\Twilio\Services;

use App\Services\Exceptions\MessageException;
use App\Services\Message as Service;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class Message implements Service
{

    /**
     * @var Client
     */
    private $client;

    /**
     * Message constructor.
     * @param Client|null $client
     * @throws ConfigurationException
     */
    public function __construct(Client $client = null)
    {
        if ($client !== null) {
            $this->client = $client;
        } else {
            $this->client = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
        }
    }

    /**
     * @param string $to
     * @param string $body
     * @return string
     * @throws MessageException
     */
    public function send(string $to, string $body)
    {
        try {
            $message = $this->client->api->messages->create($to, [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => $body,
            ]);
        } catch (TwilioException $e) {
            throw new MessageException($e);
        }
        return $message->sid;
    }
}
