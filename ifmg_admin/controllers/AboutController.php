<?php
/**
 * AboutController
 * Manages History, Vision, Mission, and other About Us content
 */

class AboutController extends Controller
{
    private $pageModel;

    public function __construct()
    {
        $this->pageModel = new Page();
    }

    /**
     * Manage History Page
     */
    public function history()
    {
        $page = $this->pageModel->getBySlug('history');
        // If not exists, we should seed it or handle it. 
        // For simplicity, assume it exists or create placeholder
        if (!$page) {
            // Placeholder logic or error
        }

        return $this->view('about/edit', [
            'page_title' => 'Manage History',
            'page' => $page,
            'slug' => 'history'
        ]);
    }

    /**
     * Manage Vision & Mission Page
     */
    public function visionMission()
    {
        $page = $this->pageModel->getBySlug('vision-mission');
        return $this->view('about/edit', [
            'page_title' => 'Manage Vision & Mission',
            'page' => $page,
            'slug' => 'vision-mission'
        ]);
    }

    /**
     * Update Page Content
     */
    public function update($slug)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect('dashboard');
        }

        $data = $_POST;
        if ($this->pageModel->update($slug, $data)) {
            Session::setFlash('success', 'Page updated successfully.');
        } else {
            Session::setFlash('error', 'Failed to update page.');
        }

        return $this->redirect('about/' . $slug);
    }
}
