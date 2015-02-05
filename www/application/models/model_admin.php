<?php

class Model_Admin extends Model
{
    private $db;
    
    public function __construct() {
        $this->db = new Db(Config::hostDb, Config::userDb, Config::passDb, Config::baseDb);
    }
    
    public function addmenu()
    {
        $data = array();
        $data['success'] = false;    
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
        return $data;
    }
    
    public function getMenuList()
    {
        $this->db->query("SELECT id,name,title FROM `db_menu`");
        while($temp = $this->db->fetch_row())
        {
            $data['menu'][] = $temp;
        }
        return $data;
    }
    
    public function remove()
    {
        $id = intval($_REQUEST['id']);
        $this->db->query("DELETE FROM `db_menu` WHERE id='$id'");
        //header("Location: /admin/menu");
    }
}

