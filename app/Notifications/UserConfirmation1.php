<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Carbon\Carbon;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use Spatie\IcalendarGenerator\Properties\TextProperty;

class UserConfirmation1 extends Notification
{
    use Queueable;

    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $calendar = Calendar::create()
            ->event(function (Event $event) {
                $event->name($this->details['vaccine'])
                    ->description('Your request for ' . $this->details['vaccine'] . ' sent successfully.')
                    ->organizer("wellpharmacy@petegypt.net", "Well Plus Compounding Pharmacy*")
                    ->startsAt(Carbon::parse($this->details['day_date'] . ' ' . $this->details['day_time']));
                    // ->address('Well Plus Pharmacy clinic');
            });
        $calendar->appendProperty(TextProperty::create('METHOD', 'REQUEST'));

        $thanks = new HtmlString($this->details['body']);
        return (new MailMessage)
            ->greeting($this->details['subject'])
            ->line($thanks)
            ->action($this->details['actionText'], $this->details['actionURL'])
            ->attachData($calendar->get(), 'invite.ics', [
                'mime' => 'text/calendar; charset=UTF-8; method=REQUEST',
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
