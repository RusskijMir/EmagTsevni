<?php
if($data['success'] == false)
{
    if(isset($data['answer'])) 
        echo $data['answer'];
?>
<form action="" method="post">
    <div>
        <div>Регистрация</div>
        <div>
            <div>Ваш псевдоним: <font color="red">*</font>
            </div>
            <div>
                <input name="login" type="text" size="25" maxlength="10" value="<?php if(isset($data['login'])) echo $data['login'] ?>"/>
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
                <input name="email" type="text" size="25" maxlength="50" value="<?php if(isset($data['email'])) echo $data['email'] ?>"/>
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
<?php 
}
else
    echo $data['answer'];
?>