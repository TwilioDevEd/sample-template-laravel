<?php

namespace Tests\Feature;

use App\Services\Exceptions\MessageException;
use App\Services\Message;
use Tests\TestCase;

class SendSmsTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testSendMessageActionOnSuccess()
    {
        $this->mock(Message::class, function ($mock) {
            $mock->shouldReceive('send')
                ->once()
                ->with('+1111', 'message')
                ->andReturns('SID');
        });

        $response = $this->json('POST', '/send-sms', ['to' => '+1111', 'body' => 'message']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => 'SMS sent to +1111. Message SID: SID',
            ]);
    }

    /**
     *
     * @return void
     */
    public function testSendMessageActionOnError()
    {
        $this->mock(Message::class, function ($mock) {
            $mock->shouldReceive('send')
                ->once()
                ->with('+1111', 'message')
                ->andThrow(new MessageException());
        });

        $response = $this->json('POST', '/send-sms', ['to' => '+1111', 'body' => 'message']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'error',
                'message' => 'Failed to send SMS. Check server logs for more details.',
            ]);
    }
}
