<?php
/**
 * Newsletter Model
 */

class NewsletterSubscriber extends Model
{
    protected $table = 'newsletter_subscribers';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY subscribed_at DESC")->fetch_all(MYSQLI_ASSOC);
    }
}
