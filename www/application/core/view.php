<?php

class View
{
    protected $template;
    
    public function __construct() 
    {
        $this->template = 'template';
    }
    
    public function generate($content_view, $data = null)
    {
        include 'application/views/'.$this->template.'/'.$this->template.'.php';
    }
}

