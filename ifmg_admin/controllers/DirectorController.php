<?php
/**
 * DirectorController
 */

class DirectorController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new DirectorMessage();
    }

    public function edit()
    {
        $data = $this->model->get();
        return $this->view('director/edit', [
            'page_title' => 'Director Message',
            'data' => $data
        ]);
    }

    public function update()
    {
        $current = $this->model->get();
        $data = $_POST;
        $data['photo'] = $current['photo'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $data['photo'] = Helpers::uploadFile($_FILES['image'], 'director');
        }

        if ($this->model->update($data)) {
            Session::setFlash('success', 'Director message updated.');
        } else {
            Session::setFlash('error', 'Update failed.');
        }
        return $this->redirect('director-message');
    }
}
