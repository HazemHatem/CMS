<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleApprovedNotification extends Notification
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
            ->subject('Your article has been approved')
            ->line('The article has been approved: ' . $this->article->title)
            ->action('View Article', route('article.show', $this->article->id));
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->article->title,
            'message' => 'The article has been approved: ' . $this->article->title,
            'url' => route('article.show', $this->article->id),
        ];
    }
}
