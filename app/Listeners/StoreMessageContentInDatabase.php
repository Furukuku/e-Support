<?php

namespace App\Listeners;

use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Queue\InteractsWithQueue;

class StoreMessageContentInDatabase
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
    public function handle(NotificationSent $event): void
    {
        // $notification = $event->notification;
        // $notifiable = $event->notifiable;

        // Message::create([
        //     'content' => $notification->toVonage($notifiable)->content,
        // ]);
    }
}
