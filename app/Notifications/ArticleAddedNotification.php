<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleAddedNotification extends Notification
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
            ->subject('New article needs review')
            ->line('A new article has been added titled: '  . $this->article->title)
            ->action('View Article', route('Admin.article.show', $this->article->id))
            ->line('Please approve or reject the article.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->article->title,
            'message' => 'A new article has been added titled: ' . $this->article->title,
            'url' => route('Admin.article.show', $this->article->id),
        ];
    }
}
