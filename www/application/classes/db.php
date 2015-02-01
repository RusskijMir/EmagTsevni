<?php

class Db
{
    
    private $con = false;
    private $lastQuery;
    
    public function __construct($host, $user, $pass, $base) 
    {
        $this->connect($host, $user, $pass, $base);
    }
    
    private function connect($host, $user, $pass, $base)
    {
        $this->con = @mysqli_connect($host, $user, $pass, $base) or $this->get_error(mysqli_connect_error());
    }
    
    private function get_error($error_string)
    {
        die($error_string);
    }
    
    public function query($query)
    {        
        $this->lastQuery = mysqli_query($this->con, $query) or $this->get_error(mysqli_error($this->con));
        return $this->lastQuery;
    }
    
    public function fetch_row()
    {
        $result = mysqli_fetch_row($this->lastQuery);
        return (count($result) > 1) ? $result : $result[0];
    }
    
    public function fetch_array()
    {
        return mysqli_fetch_array($this->lastQuery);
    }
    
    public function escape_string($string)
    {
        return mysqli_real_escape_string($this->con, $string);
    }
}

