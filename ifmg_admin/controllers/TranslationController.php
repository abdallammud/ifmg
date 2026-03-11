<?php
/**
 * TranslationController
 */

class TranslationController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Translation();
    }

    public function index()
    {
        $translations = $this->model->getAll();
        return $this->view('translations/index', [
            'page_title' => 'Translation Manager',
            'translations' => $translations
        ]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('translations');

        $key = $_POST['key'];
        $en_val = $_POST['en'];
        $so_val = $_POST['so'];

        $this->model->updateKey($key, 'en', $en_val);
        $this->model->updateKey($key, 'so', $so_val);

        if (isset($_POST['ajax'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            exit;
        }

        Session::setFlash('success', 'Translation updated.');
        return $this->redirect('translations');
    }

    public function export()
    {
        $data = $this->model->getForExport();
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $path = BASE_PATH . '/assets/translations.json';
        if (file_put_contents($path, $json)) {
            Session::setFlash('success', 'Translations exported to assets/translations.json');
        } else {
            Session::setFlash('error', 'Export failed. Check folder permissions.');
        }
        return $this->redirect('translations');
    }
}
