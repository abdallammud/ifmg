<?php
/**
 * CoreValueController
 */

class CoreValueController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new CoreValue();
    }

    public function index()
    {
        $values = $this->model->getAll();
        return $this->view('core-values/index', [
            'page_title' => 'Core Values',
            'values' => $values
        ]);
    }

    public function create()
    {
        return $this->view('core-values/create', ['page_title' => 'Add Core Value']);
    }

    public function store()
    {
        $data = $_POST;
        if ($this->model->create($data)) {
            Session::setFlash('success', 'Core value added.');
            return $this->redirect('core-values');
        }
        Session::setFlash('error', 'Failed to add core value.');
        return $this->redirect('core-values/create');
    }

    public function edit($id)
    {
        $value = $this->model->getById($id);
        if (!$value) {
            Session::setFlash('error', 'Core value not found.');
            return $this->redirect('core-values');
        }
        return $this->view('core-values/edit', [
            'page_title' => 'Edit Core Value',
            'value' => $value
        ]);
    }

    public function update($id)
    {
        $data = $_POST;
        if ($this->model->update($id, $data)) {
            Session::setFlash('success', 'Core value updated.');
            return $this->redirect('core-values');
        }
        Session::setFlash('error', 'Failed to update core value.');
        return $this->redirect('core-values/edit/' . $id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        Session::setFlash('success', 'Core value deleted.');
        return $this->redirect('core-values');
    }
}
