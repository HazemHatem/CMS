<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleRejectedNotification extends Notification
{
    use Queueable;

    private $article;

    public function __construct($article)
    {
        $this->article = $article;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Article rejected')
            ->line('The article has been rejected: ' . $this->article->title);
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->article->title,
            'message' => 'The article has been rejected: ' . $this->article->title,
        ];
    }
}
