<?php

class Model_Admin extends Model
{
    private $db;
    
    public function __construct() {
        $this->db = new Db(Config::hostDb, Config::userDb, Config::passDb, Config::baseDb);
    }
    
    public function addMenu()
    {
        $data = array();
        $data['success'] = false;
        if(isset($_POST["add"]))
        {            
            if(isset($_POST["header"]))
            {
                $link = Validator::isInnerLink($_POST["link"]);
                $header = $this->db->escape_string($_POST["header"]);                
                if($link !== false)
                {
                    $this->db->query("INSERT INTO `db_menu` (`header`,`link`) VALUES('$header','$link')");
                    $data['success'] = true;
                    $data['answer'] = "Пункт меню успешно добавлен";
                }
                else
                {
                    $data['answer'] = "Некорректная ссылка";
                }
            }
            else 
            {
                $data['answer'] = "Вы не ввели заголовок пункта меню!";
            }            
        }
        return $data;
    }
    
    public function getMenu()
    {
        $this->db->query("SELECT `header`,`link` FROM `db_menu`");
        $data['return'] = array();
        while($data['return'][] = $this->db->fetch_row());
        return $data;
    }
}

