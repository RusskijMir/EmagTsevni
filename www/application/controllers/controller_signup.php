<?php

class Controller_Signup extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Signup();
    }
    
    public function action_index() {
        $data = $this->model->signup();
        if(empty($data))  
        {
            $this->view->generate('view_signup.php');
        }
        else
        {
            $this->view->generate('view_signup.php', $data);
        }
    }
}

