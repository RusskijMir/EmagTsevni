<?php

class Validator
{
    
    public function isLogin($login, $mask="^[a-zA-Z0-9]", $len="{4,10}")
    {
        //Зачем все-таки здесь нужен is_array?
        return (is_array($login)) ? false : (preg_match("/{$mask}{$len}/", $login)) ? $login : false;
        //$ в конце регулярного выражения - конец строки
    }
    
    public function isPassword($password, $mask="^[a-zA-Z0-9]", $len="{6,20}")
    {
        //Зачем все-таки здесь нужен is_array?
        return (is_array($password)) ? false : (preg_match("/{$mask}{$len}/", $password)) ? $password : false;
        //$ в конце регулярного выражения - конец строки
    }
    
    public function isMail($mail)
    {
        if(is_array($mail) && empty($mail) && strlen($mail) > 255 && strpos($mail, '@') > 64) return false;
        return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $mail)) ? false : strtolower($mail);
    }
    
    public function isInnerLink($link)
    {
        return (preg_match("/^([a-z0-9\/]+)$/i", $link)) ? strtolower($link) : false;
    }
}
?>

