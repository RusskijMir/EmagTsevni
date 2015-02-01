<?php

class View
{
    protected $template;
    
    public function __construct() 
    {
        $this->template = 'main_template';
    }
    
    public function generate($content_view, $data = null)
    {
        include 'templates/'.$this->template.'.php';
    }
}

