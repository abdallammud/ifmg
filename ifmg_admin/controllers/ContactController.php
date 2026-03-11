<?php
/**
 * ContactController
 */

class ContactController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Contact();
    }

    public function index()
    {
        $messages = $this->model->getAll();
        return $this->view('contacts/index', [
            'page_title' => 'Contact Inbox',
            'messages' => $messages
        ]);
    }

    public function view_message($id)
    {
        $message = $this->model->getById($id);
        if (!$message)
            return $this->redirect('contacts');

        $this->model->markAsRead($id);

        return $this->view('contacts/view', [
            'page_title' => 'View Message',
            'message' => $message
        ]);
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Message deleted.');
        } else {
            Session::setFlash('error', 'Delete failed.');
        }
        return $this->redirect('contacts');
    }
}
