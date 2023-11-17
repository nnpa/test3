<?php 
use app\models\Region;
use app\models\Azs;
$region = Region::find()->all();


?>
<br>
<br>
<h4>Добавить машину</h4>

<form method="POST">
    
    <b>Марка</b><br>
    <input type="text" name="mark" value="<?php echo $car->mark;?>"><br>
    <b>Регион</b><br>
    <select name="region">
        <?php foreach($region as $a):?>
            <option value="<?php echo $a->name;?>"><?php echo $a->name;?></option>
        <?php endforeach;?>
    </select><br>
    <b>Общий объем</b><br>
    <input type="text" name="vol" value="<?php echo $car->vol;?>"><br>
    <b>объем 1 секции</b><br>
    <input type="text" name="sec1" value="<?php echo $car->sec1;?>"><br>
    <b>объем 2 секции</b><br>
    <input type="text" name="sec2" value="<?php echo $car->sec2;?>"><br>
    <b>объем 3 секции</b><br>
    <input type="text" name="sec3" value="<?php echo $car->sec3;?>"><br>
    <b>объем 4 секции</b><br>
    <input type="text" name="sec4" value="<?php echo $car->sec4;?>"><br>
    <b>объем 5 секции</b><br>
    <input type="text" name="sec5" value="<?php echo $car->sec5;?>"><br>
    <b>объем 6 секции</b><br>
    <input type="text" name="sec6" value="<?php echo $car->sec6;?>"><br>
    <b>Статус</b><br>
    <select name="state">
        <option value="свободен">свободен</option>
        <option value="занят">занят</option>

    </select><br><br>
    <input type="submit" class="btn btn-success" value="Сохранить">

</form>