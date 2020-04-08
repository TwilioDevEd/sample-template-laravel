<?php


namespace Tests\Unit;

use App\Services\Exceptions\MessageException;
use App\Twilio\Services\Message;
use Mockery;
use Tests\TestCase;
use Twilio\Exceptions\TwilioException;

class MessageServiceTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        putenv('TWILIO_PHONE_NUMBER=12345');
    }

    public function testSendMessage_CallsTwilioMessageCreate()
    {
        $mockClient = Mockery::mock('Twilio\Rest\Client', function ($mock) {
            $mockMessage = new \stdClass();
            $mockMessage->sid = 'SID';
            $mock->api = Mockery::mock();
            $mock->api->messages = Mockery::mock();
            $mock->api->messages
                ->shouldReceive('create')
                ->once()
                ->with('1111', ['body'=>'message', 'from' => '12345'])
                ->andReturn($mockMessage);
        });

        $service = new Message($mockClient);

        $sid = $service->send('1111', 'message');

        $this->assertEquals('SID', $sid);
    }

    public function testSendMessageOnFailure_RaisesMessageException()
    {
        $mockClient = Mockery::mock('Twilio\Rest\Client', function ($mock) {
            $mock->api = Mockery::mock();
            $mock->api->messages = Mockery::mock();
            $mock->api->messages
                ->shouldReceive('create')
                ->once()
                ->withAnyArgs()
                ->andThrow(new TwilioException('oops'));
        });

        $service = new Message($mockClient);

        $this->expectException(MessageException::class);

        $service->send('1111', 'message');
    }
}
