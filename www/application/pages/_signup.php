<!-- Общие замечания по файлу
1. Сделать стилями поле ввода и заголовок на одной строке
2. Выделить стилем регистрацию
3. Добавить автозаполнения email, логина и т.д. при переадресации
4. Добавить ввод капчи для подтверждения регистрации
5. Если задан $_SESSION["user_id"] переадресация в аккаунт
6. Обработать стилями сообщения, генерируемые скриптом-->
<?php
    if(isset($_POST["login"]))
    {
        //Здесь должна быть обработка капчи
        $login = $Controller->isLogin($_POST["login"]);
        $email = $Controller->isMail($_POST["email"]);
        $pass = $Controller->isPassword($_POST["pass"]);
        $rules = isset($_POST["rules"])? true : false;
        //Должна быть работа с ip адресом и инициализация переменной времени
        //А также инициализация id и имени реферера
        
        if($rules !== false)
            if($login !== false)
                if($email !== false)
                    if($pass !== false)
                        if($pass == $_POST["repass"])
                        {
                            if($pass == $_POST["repass"])
                            {
                                echo "Вы успешно зарегистрированы";
                            }
                            else
                            {
                                echo "Пароль и его повтор не совпадают!";
                            }
                        }    
                        else
                            echo "Пароль и его повтор не совпадают";
                    else
                        echo "Неверный формат пароля";
                else
                    echo "Неверный формат email адреса";
            else
                echo "Неверный формат логина";
        else
            echo "Вы не подтвердили правила!";
    }
?>
<form action="" method="post">
    <div>
        <div>Регистрация</div>
        <div>
            <div>Ваш псевдоним: <font color="red">*</font>
            </div>
            <div>
                <input name="login" type="text" size="25" maxlength="10" value="<?=(isset($_POST["login"])) ? $_POST["login"] : false?>"/>
            </div>
            <div>
                Поле псевдоним должно содержать от 4 до 10 английских символов.
            </div>
        </div>
        <div>
            <div>
                Email: <font color="red">*</font>
            </div>
            <div>
                <input name="email" type="text" size="25" maxlength="50" value="<?=(isset($_POST["email"])) ? $_POST["email"] : false?>"/>
            </div>            
        </div>
        <div>
            <div>
                Пароль: <font color="red">*</font>
            </div>
            <div>
                <input name="pass" type="password" size="25" maxlength="20" />
            </div>     
            <div>
                Поле пароль должно содержать от 6 до 20 английских символов или цифр.
            </div>
        </div>
        <div>
            <div>
                Пароль еще раз: <font color="red">*</font>
            </div>
            <div>
                <input name="repass" type="password" size="25" maxlength="20"/>
            </div>            
        </div>
        <div>
            Пароли должны совпадать.
        </div>
        <div>
            C <a href="/rules" target="_blank">правилами</a> ознакомлен(а) и принимаю: <input name="rules" type="checkbox"/>
        </div>
        <div>
            <div>
                <img src="captcha.img" alt="Здесь должна быть капча"/> 
                Введите символы с картинки: <font color="red">*</font>   
            </div>
            <div>
                <input name="captcha" type="text" size="25" maxlength="50"/>
            </div>
        </div>
        <div>
            <input name="register" type="submit" value="Зарегистрироваться"/>
        </div>
    </div>
</form>

