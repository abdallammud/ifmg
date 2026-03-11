<?php
/**
 * ActivityController
 */

class ActivityController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new ActivityLog();
    }

    public function index()
    {
        $logs = $this->model->getAll();
        return $this->view('activity/index', [
            'page_title' => 'System Activity Log',
            'logs' => $logs
        ]);
    }
}
