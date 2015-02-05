<?php

class Controller
{
    protected $model;
    protected $view;
    
    public function __construct() {
        $this->view = new View();
    }
    
    public function action_index()
    {
        
    }
    
    public function modelMethodInvoked()
    {
        if(isset($_GET['action']))
        {
            if(method_exists($this->model, $_GET['action']))
            {
                return true;
            }            
        }
        return false;
    }
}

