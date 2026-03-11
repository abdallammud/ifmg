<?php
/**
 * MediaLibraryController
 */

class MediaLibraryController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Media();
    }

    public function index()
    {
        $type = $_GET['type'] ?? null;
        $assets = $this->model->getAll($type);

        return $this->view('media-library/index', [
            'page_title' => 'Media Library',
            'assets' => $assets,
            'current_type' => $type
        ]);
    }

    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['file'])) {
            return $this->json(['error' => 'Invalid request'], 400);
        }

        $file = $_FILES['file'];
        $filename = Helpers::uploadFile($file, 'library');

        if ($filename) {
            $user_id = Auth::user()['id'];
            $file_path = 'uploads/' . $filename;
            $this->model->create($filename, $file['name'], $file['type'], $file['size'], $file_path, $user_id);
            return $this->json(['success' => true, 'filename' => $filename]);
        }

        return $this->json(['error' => 'Upload failed'], 500);
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Asset deleted.');
        } else {
            Session::setFlash('error', 'Delete failed.');
        }
        return $this->redirect('media-library');
    }

    private function json($data, $code = 200)
    {
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($data);
        exit;
    }
}
