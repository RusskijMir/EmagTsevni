<?php

class Controller_Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->model = new Model_Admin();
    }

    public function action_index() {
        $this->view->generate('view_admin.php');
    }
    
    public function action_menu()
    {
        if(isset($_POST["add"]))
        {
            $this->data = $this->model->addMenu();
        }
        $this->data = $this->model->getMenu();
        $this->view->generate('admin/view_admin_menu.php', $this->data);
    }
}

