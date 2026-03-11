<?php
/**
 * EventController
 * Manages Events CRUD
 */

class EventController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function index()
    {
        $events = $this->model->getAll();
        return $this->view('events/index', [
            'page_title' => 'Manage Events',
            'events' => $events
        ]);
    }

    public function create()
    {
        return $this->view('events/create', [
            'page_title' => 'Add Event'
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('events');

        $data = $_POST;

        if ($this->model->create($data)) {
            Session::setFlash('success', 'Event added successfully.');
        } else {
            Session::setFlash('error', 'Failed to add event.');
        }
        return $this->redirect('events');
    }

    public function edit($id)
    {
        $event = $this->model->getById($id);
        if (!$event)
            return $this->redirect('events');

        return $this->view('events/edit', [
            'page_title' => 'Edit Event',
            'event' => $event
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            return $this->redirect('events');

        $data = $_POST;

        if ($this->model->update($id, $data)) {
            Session::setFlash('success', 'Event updated successfully.');
        } else {
            Session::setFlash('error', 'Failed to update event.');
        }
        return $this->redirect('events');
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            Session::setFlash('success', 'Event deleted successfully.');
        } else {
            Session::setFlash('error', 'Failed to delete event.');
        }
        return $this->redirect('events');
    }
}
