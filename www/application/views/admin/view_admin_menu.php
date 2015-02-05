<div>
<?php if(isset($data['menu']))
{   
?>
<table>
<?php 
    $i = 0;
    foreach($data['menu'] as $elem)
    {
        $i++;
        echo "<tr><td>".$elem[0]."</td><td>".$elem[1]."</td><td>".$elem[2]."</td>"
                . "<td><a href='?action=change&id=$elem[0]'>Редактировать</a></td>"
                . "<td><a href='?action=remove&id=$elem[0]'>Удалить</a></tr>";
    }
?>
</table>
<?php
}
else
{
   echo 'Ни одно меню еще не добавлено'; 
}
?>
</div>
<div>
    <form action="" method="post">
        <input name="add" type="submit" value="Добавить">
    </form>
</div>