<?php
/**
 * AnnouncementController
 */

class AnnouncementController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Announcement();
    }

    public function index()
    {
        $announcements = $this->model->getAll();
        return $this->view('announcements/index', [
            'page_title' => 'Manage Announcements',
            'announcements' => $announcements
        ]);
    }

    public function create()
    {
        return $this->view('announcements/create', [
            'page_title' => 'Add Announcement'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('announcements');

        $data = $_POST;

        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
            $data['attachment'] = Helpers::uploadFile($_FILES['attachment'], 'announcements');
        } else {
            $data['attachment'] = null;
        }

        if ($this->model->create($data)) {
            Session::setFlash('success', 'Announcement added successfully.');
        } else {
            Session::setFlash('error', 'Failed to add announcement.');
        }
        return $this->redirect('announcements');
    }

    public function edit($id)
    {
        $announcement = $this->model->getById($id);
        if (!$announcement)
            return $this->redirect('announcements');

        return $this->view('announcements/edit', [
            'page_title' => 'Edit Announcement',
            'announcement' => $announcement
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('announcements');

        $announcement = $this->model->getById($id);
        $data = $_POST;
        $data['attachment'] = $announcement['attachment'];

        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
            $data['attachment'] = Helpers::uploadFile($_FILES['attachment'], 'announcements');
        }

        if ($this->model->update($id, $data)) {
            Session::setFlash('success', 'Announcement updated successfully.');
        } else {
            Session::setFlash('error', 'Failed to update announcement.');
        }
        return $this->redirect('announcements');
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Announcement deleted successfully.');
        } else {
            Session::setFlash('error', 'Failed to delete announcement.');
        }
        return $this->redirect('announcements');
    }
}
