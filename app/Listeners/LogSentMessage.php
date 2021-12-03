<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogSentMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSending  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        /*
        // $event->message->getTo() returns assoc arrays with email => name 
            $emails = array_keys($event->message->getTo());  
            $subject = $event->message->getSubject();
        */
        Log::info('MESSAGE ID: ' . $event->message->getId().'=>'.$event->message->getSubject());
    }


    /**
     * Handle a job failure.
     *
     * @param  \App\Events\MessageSending  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(MessageSending $event, $exception)
    {
        Log::error('Failed MESSAGE ID: ' . $exception->getmessage());
    }

}
