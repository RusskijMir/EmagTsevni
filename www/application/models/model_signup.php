<?php

class Model_Signup extends Model
{
    private $db;
    
    public function __construct() {
        $this->db = new Db(Config::hostDb, Config::userDb, Config::passDb, Config::baseDb);
    }
    
    private function is_unique_email($email)
    {
        $this->db->query("SELECT COUNT(*) FROM db_users_a WHERE email='$email'");
        if($this->db->fetch_row() == 0)
            return true;
        else 
            return false;
    }
    
    private function is_unique_login($login)
    {
        $this->db->query("SELECT COUNT(*) FROM db_users_a WHERE user='$login'");
        if($this->db->fetch_row() == 0)
            return true;
        else 
            return false;
    }
    
    public function signup()
    {
        $data = array();
        $data['success'] = false;
        if(isset($_POST['register']))
        {
            $login = Validator::isLogin($_POST['login']);
            $email = Validator::isMail($_POST['email']);
            $pass = Validator::isPassword($_POST['pass']);
            $rules = isset($_POST['rules'])? true : false;
            
            if($rules)
            {
                if($login !== false)
                {
                    if($email !== false)
                    {
                        if($pass !== false)
                        {
                            if($pass == $_POST['repass'])
                            {                           
                                $uniqueEmail = $this->is_unique_email($email);
                                $uniqueLogin = $this->is_unique_login($login);
                                if($uniqueEmail && $uniqueLogin)
                                {
                                    $this->db->query("INSERT INTO db_users_a(user,email,pass) VALUES('$login','$email','$pass')");
                                    $this->db->query("UPDATE db_stats SET all_users = all_users + 1 WHERE id = '1'");
                                    $data['answer'] = "Вы успешно зарегистрированы. Воспользуйтесь формой авторизации для входа в аккаунт";
                                    $data['success'] = true;  
                                }
                                else
                                {
                                    if(!$uniqueEmail && !$uniqueLogin)
                                    {
                                        $data['answer'] = "Эта пара псевдоним/email уже присутствует в системе";                                      
                                    }            
                                    else
                                    {
                                        if(!$uniqueLogin)
                                        {
                                            $data['email'] = $_POST['email'];
                                            $data['answer'] = "Этот псевдоним уже зарегистрирован в системе";  
                                        }
                                        else
                                        {
                                            $data['login'] = $_POST['login'];
                                            $data['answer'] = "Этот email уже присутствует в системе";
                                        }
                                    }
                                }
                                
                            }
                            else
                            {
                                $data['login'] = $_POST['login'];
                                $data['email'] = $_POST['email'];
                                $data['answer'] = "Пароль и его повтор не совпадают";
                            }
                        }
                        else
                        {
                            $data['login'] = $_POST['login'];
                            $data['email'] = $_POST['email'];
                            $data['answer'] = "Недопустимый пароль";                
                        }
                    }
                    else
                    {
                        $data['login'] = $_POST['login'];
                        $data['answer'] = "Недопустимый email";                
                    }
                }
                else
                {
                    $data['answer'] = "Недопустимый псевдоним";                
                }
            }
            else 
            {
                $data['answer'] = "Вы не подтверидили правила";
                $data['login'] = $_POST['login'];
                $data['email'] = $_POST['email'];
            }
            
        }       
        return $data;
    }        
}

