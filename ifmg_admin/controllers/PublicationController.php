<?php
/**
 * PublicationController
 * Manages Publications CRUD
 */

class PublicationController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Publication();
    }

    public function index()
    {
        $publications = $this->model->getAll();
        return $this->view('publications/index', [
            'page_title' => 'Manage Publications',
            'publications' => $publications
        ]);
    }

    public function create()
    {
        return $this->view('publications/create', [
            'page_title' => 'Add Publication'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('publications');

        $data = $_POST;

        // Handle Cover Image Upload
        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
            $data['cover_image'] = Helpers::uploadFile($_FILES['cover_image'], 'publications/covers');
        } else {
            $data['cover_image'] = null;
        }

        // Handle PDF File Upload
        if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
            $data['pdf_file'] = Helpers::uploadFile($_FILES['pdf_file'], 'publications/docs');
        } else {
            Session::setFlash('error', 'PDF file is required.');
            return $this->redirect('publications/create');
        }

        if ($this->model->create($data)) {
            Session::setFlash('success', 'Publication added successfully.');
        } else {
            Session::setFlash('error', 'Failed to add publication.');
        }
        return $this->redirect('publications');
    }

    public function edit($id)
    {
        $publication = $this->model->getById($id);
        if (!$publication)
            return $this->redirect('publications');

        return $this->view('publications/edit', [
            'page_title' => 'Edit Publication',
            'publication' => $publication
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('publications');

        $publication = $this->model->getById($id);
        $data = $_POST;
        $data['cover_image'] = $publication['cover_image'];
        $data['pdf_file'] = $publication['pdf_file'];

        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
            $data['cover_image'] = Helpers::uploadFile($_FILES['cover_image'], 'publications/covers');
        }

        if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
            $data['pdf_file'] = Helpers::uploadFile($_FILES['pdf_file'], 'publications/docs');
        }

        if ($this->model->update($id, $data)) {
            Session::setFlash('success', 'Publication updated successfully.');
        } else {
            Session::setFlash('error', 'Failed to update publication.');
        }
        return $this->redirect('publications');
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Publication deleted successfully.');
        } else {
            Session::setFlash('error', 'Failed to delete publication.');
        }
        return $this->redirect('publications');
    }
}
