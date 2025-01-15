<?php
require_once 'models/Alojamiento.php';

class AccommodationController {
    private $model;

    public function __construct() {
        $this->model = new Accommodation();
    }

    public function index() {
        $accommodations = $this->model->getAll();
        require 'views/Accommodations/index.php';
    }

    public function create() {
        require 'views/Accommodations/create.php';
    }

    public function store($data) {
        $this->model->create($data);
        header('Location: /');
    }

    public function edit($id) {
        $accommodation = $this->model->getById($id);
        require 'views/Accommodations/edit.php';
    }

    public function update($id, $data) {
        $this->model->update($id, $data);
        header('Location: /');
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: /');
    }
}
