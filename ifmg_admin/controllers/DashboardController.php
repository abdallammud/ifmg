<?php
/**
 * Dashboard Controller
 */

class DashboardController extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }

    public function index()
    {
        $data = [
            'page_title' => 'Dashboard',
            'user' => Auth::user()
        ];
        $this->view('dashboard/index', $data);
    }
}
