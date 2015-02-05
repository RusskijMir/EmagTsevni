<?php
    require_once 'application/core/view.php';
    require_once 'application/core/controller.php';
    require_once 'application/core/model.php';
    require_once 'application/core/route.php';
    
    function __autoload($class_name)
    {
        require_once 'application/classes/'.strtolower($class_name).'.php';
    }
    session_start();    
    Route::start();
    session_destroy();
?>



