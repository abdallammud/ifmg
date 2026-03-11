<?php
/**
 * UserController
 */

class UserController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {
        $users = $this->model->getAll();
        return $this->view('users/index', [
            'page_title' => 'User Management',
            'users' => $users
        ]);
    }

    public function create()
    {
        return $this->view('users/create', [
            'page_title' => 'Add New User'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('users');

        $data = $_POST;
        if ($data['password'] !== $data['password_confirm']) {
            Session::setFlash('error', 'Passwords do not match.');
            return $this->redirect('users/create');
        }

        $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($this->model->create($data)) {
            ActivityLog::log('CREATE', 'user', null, "Created user: {$data['username']}");
            Session::setFlash('success', 'User created successfully.');
        } else {
            Session::setFlash('error', 'Failed to create user. Username or email may exist.');
        }
        return $this->redirect('users');
    }

    public function edit($id)
    {
        $user = $this->model->getById($id);
        if (!$user)
            return $this->redirect('users');

        return $this->view('users/edit', [
            'page_title' => 'Edit User',
            'user' => $user
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('users');

        $user = $this->model->getById($id);
        $data = $_POST;

        if (!empty($data['password'])) {
            if ($data['password'] !== $data['password_confirm']) {
                Session::setFlash('error', 'Passwords do not match.');
                return $this->redirect('users/edit/' . $id);
            }
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            $data['password_hash'] = $user['password_hash'];
        }

        if ($this->model->update($id, $data)) {
            ActivityLog::log('UPDATE', 'user', $id, "Updated user: {$user['username']}");
            Session::setFlash('success', 'User updated successfully.');
        } else {
            Session::setFlash('error', 'Update failed.');
        }
        return $this->redirect('users');
    }

    public function delete($id)
    {
        // Don't allow self-deletion
        if ($id == Session::get('user_id')) {
            Session::setFlash('error', 'You cannot delete yourself.');
            return $this->redirect('users');
        }

        if ($this->model->delete($id)) {
            ActivityLog::log('DELETE', 'user', $id, "Deleted user ID: $id");
            Session::setFlash('success', 'User deleted.');
        } else {
            Session::setFlash('error', 'Delete failed.');
        }
        return $this->redirect('users');
    }
}
