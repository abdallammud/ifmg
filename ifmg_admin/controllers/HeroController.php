<?php
/**
 * HeroController
 */

class HeroController extends Controller
{
    private $heroModel;

    public function __construct()
    {
        $this->heroModel = new HeroSlide();
    }

    public function index()
    {
        $slides = $this->heroModel->getAll();
        return $this->view('hero/index', [
            'page_title' => 'Manage Hero Slides',
            'slides' => $slides
        ]);
    }

    public function create()
    {
        return $this->view('hero/create', [
            'page_title' => 'Add New Slide'
        ]);
    }

    public function store()
    {
        $data = $_POST;

        // Handle Image Upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $data['bg_image'] = Helpers::uploadFile($_FILES['image'], 'hero');
        } else {
            Session::setFlash('error', 'Image is required.');
            return $this->redirect('hero/create');
        }

        if ($this->heroModel->create($data)) {
            Session::setFlash('success', 'Hero slide created successfully.');
            return $this->redirect('hero');
        }

        Session::setFlash('error', 'Failed to create hero slide.');
        return $this->redirect('hero/create');
    }

    public function edit($id)
    {
        $slide = $this->heroModel->getById($id);
        if (!$slide)
            return $this->redirect('hero');

        return $this->view('hero/edit', [
            'page_title' => 'Edit Slide',
            'slide' => $slide
        ]);
    }

    public function update($id)
    {
        $slide = $this->heroModel->getById($id);
        if (!$slide)
            return $this->redirect('hero');

        $data = $_POST;
        $data['bg_image'] = $slide['bg_image'];

        // Handle Image Upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $data['bg_image'] = Helpers::uploadFile($_FILES['image'], 'hero');
        }

        if ($this->heroModel->update($id, $data)) {
            Session::setFlash('success', 'Hero slide updated successfully.');
            return $this->redirect('hero');
        }

        Session::setFlash('error', 'Failed to update hero slide.');
        return $this->redirect('hero/edit/' . $id);
    }

    public function delete($id)
    {
        if ($this->heroModel->delete($id)) {
            Session::setFlash('success', 'Hero slide deleted.');
        } else {
            Session::setFlash('error', 'Failed to delete.');
        }
        return $this->redirect('hero');
    }
}
