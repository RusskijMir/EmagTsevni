<?php

class Route
{
    static function start()
    {
        $action_name = 'index';
        $controller_name = 'Index';
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        
        if(!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }
        
        if(!empty($routes[2]))
        {
            $action_name = $routes[2];
        }
        
        $action_name = 'action_'.$action_name;
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        
        $model_file = $model_name.'.php';
        $model_path = 'application/models/'.$model_file;
        if(file_exists($model_path))
        {
            include $model_path;
        }
        
        $controller_file = $controller_name.'.php';
        $controller_path = 'application/controllers/'.$controller_file;
        if(file_exists($controller_path))
        {
            include $controller_path;
        }
        else
        {
            Route::errorPage404();
        }
        
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            Route::errorPage404();
        }
    }
    
    static function errorPage404()
    {
        die('Fatal error');
    }
}

