<?php
/**
 * OrgController
 * Manages Organizational Structure
 */

class OrgController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new OrgStructure();
    }

    public function index()
    {
        $members = $this->model->getAll();
        return $this->view('org/index', [
            'page_title' => 'Organizational Structure',
            'members' => $members
        ]);
    }

    public function create()
    {
        return $this->view('org/create', [
            'page_title' => 'Add Structure Member'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('org');

        if ($this->model->create($_POST)) {
            Session::setFlash('success', 'Member added successfully.');
        } else {
            Session::setFlash('error', 'Failed to add member.');
        }
        return $this->redirect('org');
    }

    public function edit($id)
    {
        $member = $this->model->getById($id);
        if (!$member)
            return $this->redirect('org');

        return $this->view('org/edit', [
            'page_title' => 'Edit Structure Member',
            'member' => $member
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('org');

        if ($this->model->update($id, $_POST)) {
            Session::setFlash('success', 'Member updated successfully.');
        } else {
            Session::setFlash('error', 'Failed to update member.');
        }
        return $this->redirect('org');
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Member deleted successfully.');
        } else {
            Session::setFlash('error', 'Failed to delete member.');
        }
        return $this->redirect('org');
    }
}
