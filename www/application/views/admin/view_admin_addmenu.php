<?php 
foreach($data['return'] as $elem)
{
    echo "<p>".$elem[0]." ".$elem[1]."</p>";
}
?>
<div>
    <form action="" method="post">
        <div>Заголовок:
            <input name="header" type="text" size="50" maxlength="50">
        </div>
        <div>Относительная ссылка:
            <input name="link" type="text" size="50" maxlength="50">
        </div>
        <input name="add" type="submit" value="Добавить">
    </form>
</div>