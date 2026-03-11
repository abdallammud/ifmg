<?php
/**
 * NewsletterController
 */

class NewsletterController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new NewsletterSubscriber();
    }

    public function index()
    {
        $subscribers = $this->model->getAll();
        return $this->view('newsletter/index', [
            'page_title' => 'Newsletter Subscribers',
            'subscribers' => $subscribers
        ]);
    }

    public function export()
    {
        $subscribers = $this->model->getAll();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="newsletter_subscribers.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Email', 'Subscribed At']);
        foreach ($subscribers as $row) {
            fputcsv($output, [$row['id'], $row['email'], $row['subscribed_at']]);
        }
        fclose($output);
        exit;
    }
}
