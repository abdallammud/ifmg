<?php
/**
 * AnnouncementStripController
 */

class AnnouncementStripController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new AnnouncementStrip();
    }

    public function edit()
    {
        $data = $this->model->get();
        return $this->view('announcement-strip/edit', [
            'page_title' => 'Announcement Strip',
            'data' => $data
        ]);
    }

    public function update()
    {
        $data = $_POST;
        $data['is_active'] = isset($_POST['is_active']) ? 1 : 0;

        if ($this->model->update($data)) {
            Session::setFlash('success', 'Announcement strip updated.');
        } else {
            Session::setFlash('error', 'Update failed.');
        }
        return $this->redirect('announcement-strip');
    }
}
