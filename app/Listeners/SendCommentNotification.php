<?php

namespace App\Listeners;

use App\Events\Commented;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCommentNotification;

class SendCommentNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Commented $event): void
    {
        Notification::send($event->comment->post->user, new NewCommentNotification($event->comment));
    }
}
