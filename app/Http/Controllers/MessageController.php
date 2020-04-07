<?php

namespace App\Http\Controllers;

use App\Services\Exceptions\MessageException;
use App\Services\Message as MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * @var MessageService
     */
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function __invoke(Request $request)
    {
        $to = $request->post('to');
        $body = $request->post('body');

        try {
            $sid = $this->messageService->send($to, $body);
        } catch (MessageException $exception) {
            Log::error($exception->getTraceAsString());
            return [
                'status' => 'error',
                'message' => 'Failed to send SMS. Check server logs for more details.',
            ];
        }

        return [
            'status' => 'success',
            'message' => "SMS sent to {$to}. Message SID: {$sid}",
        ];
    }
}
