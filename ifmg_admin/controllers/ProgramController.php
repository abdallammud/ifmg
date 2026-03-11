<?php
/**
 * ProgramController
 * Manages Program/Workstream Deep CRUD
 */

class ProgramController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Program();
    }

    public function index()
    {
        $programs = $this->model->getAll();
        return $this->view('programs/index', [
            'page_title' => 'Manage Workstreams',
            'programs' => $programs
        ]);
    }

    public function create()
    {
        return $this->view('programs/create', [
            'page_title' => 'Create Workstream'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('programs');

        $programId = $this->model->create($_POST);
        if ($programId) {
            // Sync features and items if provided
            if (isset($_POST['features']))
                $this->model->syncFeatures($programId, $_POST['features']);
            if (isset($_POST['list_items']))
                $this->model->syncListItems($programId, $_POST['list_items']);

            Session::setFlash('success', 'Workstream created successfully.');
        } else {
            Session::setFlash('error', 'Failed to create workstream.');
        }
        return $this->redirect('programs');
    }

    public function edit($id)
    {
        $program = $this->model->getById($id);
        if (!$program)
            return $this->redirect('programs');

        return $this->view('programs/edit', [
            'page_title' => 'Edit Workstream',
            'program' => $program
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('programs');

        if ($this->model->update($id, $_POST)) {
            if (isset($_POST['features']))
                $this->model->syncFeatures($id, $_POST['features']);
            if (isset($_POST['list_items']))
                $this->model->syncListItems($id, $_POST['list_items']);

            Session::setFlash('success', 'Workstream updated successfully.');
        } else {
            Session::setFlash('error', 'Failed to update workstream.');
        }
        return $this->redirect('programs');
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Workstream deleted successfully.');
        } else {
            Session::setFlash('error', 'Failed to delete workstream.');
        }
        return $this->redirect('programs');
    }
}
