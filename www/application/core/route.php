<?php

/*Общие замечания:
 * Не нравится, что при переадресации в divideUriAndParams довыполняется текущий скрипт
 */
class Route
{
    static function start()
    {
        $action_name = 'index';
        $controller_name = 'Index';
        
        if(!Route::isCorrectUri($_SERVER['REQUEST_URI']))
            Route::errorPage404 ();
        $request_uri = Route::divideUriAndParams($_SERVER['REQUEST_URI']); 
        
        $routes = explode('/', $request_uri); 
        if(!empty($routes[1]))
        {
            $controller_name = $routes[1];
            if(!empty($routes[2]))
            {
                $action_name = $routes[2];   
            }            
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
        die('Error 404 Not Found');
    }
    
    static function divideUriAndParams($uri)
    {
        $result = $uri;
        $result = ltrim($uri, '/');
        $parts = explode('?', $result);
        if(!empty($parts[0]))
        {
            $result= "/".$parts[0];
            if($result[strlen($result)-1] != '/')
                $result.="/";
            if(!empty($parts[1]))
                $result.="?".$parts[1];            
        }
        if(strcmp($uri, $result) == 0)
        {
            return $result;
        }         
        else
        {
            header("Location: $result");
        }
    }
    
    static function isCorrectUri($uri)
    {
       return preg_match("/^(\/[\w]*){0,2}(((\/?\?)([a-z0-9]\w*=[a-z0-9]\w*)(&[a-z0-9]\w*=[a-z0-9]\w*)*)|(\/)?)$/i", $uri);        
    }
}

