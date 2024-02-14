<?php

namespace Business\Example\Domain\Notifications;

use Business\Example\Domain\Models\Example;
use Business\Shared\Domain\Messages\StandardMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class ExampleIsCompleted extends Notification implements ShouldBroadcast, ShouldQueue
{
    use Queueable;

    public function __construct(private Example $example, private string $subjectTopic)
    {
        $this->afterCommit();
        $this->queue = 'notification';
    }

    /** @return array<mixed> */
    public function via(): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail(): MailMessage
    {
        return (new StandardMessage())
            ->subject(trans('messages.emails.download.subject.title', ['topic' => $this->subjectTopic]))
            ->greeting(trans('messages.emails.download.welcome_phrase', ['name' => $this->example->user->name]))
            ->line(trans('messages.emails.download.introductory_sentence'))
            ->action(
                trans('messages.helpers.buttons.download'),
                URL::temporarySignedRoute('example', now()->addMinutes(30))
            );
    }

    public function toBroadcast(): BroadcastMessage
    {
        return new BroadcastMessage([
            'action' => URL::temporarySignedRoute('example', now()->addMinutes(30)),
            'title' => trans('messages.notifications.download_ready'),
            'action_name' => $this->example->name,
        ]);
    }

    /** @return array<mixed> */
    public function toArray(): array
    {
        return [
            'title' => trans('messages.notifications.download_ready'),
            'introductory_sentence' => trans('messages.emails.download.introductory_sentence'),
            'user_id' => $this->example->user->id,
            'action_name' => $this->example->name,
        ];
    }

    public function broadcastType(): string
    {
        return 'frontend.message.example.completed';
    }
}
