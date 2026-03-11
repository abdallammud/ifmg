<?php
/**
 * MediaController
 */

class MediaController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new MediaArticle();
    }

    public function index()
    {
        $articles = $this->model->getAll();
        return $this->view('media/index', [
            'page_title' => 'News & Media Center',
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return $this->view('media/create', [
            'page_title' => 'Add News Article'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('media');

        $data = $_POST;

        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
            $data['cover_image'] = Helpers::uploadFile($_FILES['cover_image'], 'media');
        } else {
            $data['cover_image'] = null;
        }

        $data['is_featured'] = isset($_POST['is_featured']) ? 1 : 0;
        $data['is_active'] = isset($_POST['is_active']) ? 1 : 0;

        if ($this->model->create($data)) {
            Session::setFlash('success', 'Article added successfully.');
        } else {
            Session::setFlash('error', 'Failed to add article.');
        }
        return $this->redirect('media');
    }

    public function edit($id)
    {
        $article = $this->model->getById($id);
        if (!$article)
            return $this->redirect('media');

        return $this->view('media/edit', [
            'page_title' => 'Edit News Article',
            'article' => $article
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('media');

        $article = $this->model->getById($id);
        $data = $_POST;
        $data['cover_image'] = $article['cover_image'];

        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
            $data['cover_image'] = Helpers::uploadFile($_FILES['cover_image'], 'media');
        }

        $data['is_featured'] = isset($_POST['is_featured']) ? 1 : 0;
        $data['is_active'] = isset($_POST['is_active']) ? 1 : 0;

        if ($this->model->update($id, $data)) {
            Session::setFlash('success', 'Article updated successfully.');
        } else {
            Session::setFlash('error', 'Failed to update article.');
        }
        return $this->redirect('media');
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Article deleted successfully.');
        } else {
            Session::setFlash('error', 'Failed to delete article.');
        }
        return $this->redirect('media');
    }
}
