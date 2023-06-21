<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RewardClaim extends Notification
{
    use Queueable;

    public $claim_amount,$reward_address,$claimed_on;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($claim_amount,$reward_address,$claimed_on)
    {
        $this->claim_amount=$claim_amount;
        $this->reward_address=$reward_address;
        $this->claimed_on=$claimed_on;
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
        return (new MailMessage)
                   ->subject('Claim Reward')
                   ->greeting('Hello '.$notifiable->fname)
                   ->line('Congratulations on claiming your reward for '.$this->claimed_on.'. The reward amount of $'.$this->claim_amount.' will be deposited to '.$this->reward_address.' within the next 48 hrs.')
                   ->line('Thank you for using our application!');
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
