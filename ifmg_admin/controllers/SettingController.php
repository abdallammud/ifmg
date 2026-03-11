<?php
/**
 * SettingController
 */

class SettingController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Setting();
    }

    public function index()
    {
        $settings = $this->model->getAll();
        return $this->view('settings/index', [
            'page_title' => 'Global Settings',
            'settings' => $settings
        ]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('settings');

        foreach ($_POST as $key => $value) {
            if ($key === 'submit')
                continue;
            $this->model->updateKey($key, $value);
        }

        // Handle logo upload
        if (isset($_FILES['site_logo']) && $_FILES['site_logo']['error'] == 0) {
            $filename = Helpers::uploadFile($_FILES['site_logo'], 'settings');
            if ($filename) {
                $this->model->updateKey('site_logo', 'uploads/' . $filename);
            }
        }

        Session::setFlash('success', 'Settings updated successfully.');
        return $this->redirect('settings');
    }
}
