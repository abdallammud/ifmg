<?php
/**
 * Base Controller class
 */

class Controller
{
    public function view($view, $data = [])
    {
        // Extract data to make variables available in view
        extract($data);

        // Include the view file
        $viewFile = VIEW_PATH . $view . '.php';

        if (file_exists($viewFile)) {
            // Include main layout and pass the view content
            require_once VIEW_PATH . 'layouts/app.php';
        } else {
            die("View $view not found.");
        }
    }

    public function redirect($url)
    {
        header("Location: " . BASE_URL . $url);
        exit();
    }
}
