<?php

class Controller_Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->model = new Model_Admin();
    }

    public function action_index() {
        $this->view->generate('admin/view_admin.php');
    }
    
    public function action_menu()
    {
        $this->model->initPolymorph("Menu_Manager");
        if($this->modelMethodInvoked())
        {
            $this->data = $this->model->$_REQUEST['action']();
        }       
        else
        {
            $this->data = $this->model->getMenuList();
        }
        $this->view->generate('admin/view_admin_menu.php', $this->data);
    }
}

