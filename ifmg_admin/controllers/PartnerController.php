<?php
/**
 * PartnerController
 */

class PartnerController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Partner();
    }

    public function index()
    {
        $partners = $this->model->getAll();
        return $this->view('partners/index', [
            'page_title' => 'Manage Partners',
            'partners' => $partners
        ]);
    }

    public function create()
    {
        return $this->view('partners/create', ['page_title' => 'Add Partner']);
    }

    public function store()
    {
        $data = $_POST;
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
            $data['logo'] = Helpers::uploadFile($_FILES['logo'], 'partners');
        } else {
            Session::setFlash('error', 'Logo is required.');
            return $this->redirect('partners/create');
        }

        if ($this->model->create($data)) {
            Session::setFlash('success', 'Partner added.');
            return $this->redirect('partners');
        }
        return $this->redirect('partners/create');
    }

    public function edit($id)
    {
        $partner = $this->model->getById($id);
        return $this->view('partners/edit', ['page_title' => 'Edit Partner', 'partner' => $partner]);
    }

    public function update($id)
    {
        $partner = $this->model->getById($id);
        $data = $_POST;
        $data['logo'] = $partner['logo'];

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
            $data['logo'] = Helpers::uploadFile($_FILES['logo'], 'partners');
        }

        if ($this->model->update($id, $data)) {
            Session::setFlash('success', 'Partner updated.');
            return $this->redirect('partners');
        }
        return $this->redirect('partners/edit/' . $id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        Session::setFlash('success', 'Partner deleted.');
        return $this->redirect('partners');
    }
}
