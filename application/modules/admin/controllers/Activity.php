<?php

class Activity extends Admin_Controller {
    public function index() {
        $crud = $this->generate_crud('activity_log');
        $crud->unset_add();
        $crud->unset_export();
        $crud->unset_print();
        $this->unset_crud_fields();
        $this->render_crud();
    }
}