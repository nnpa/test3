<?php 
use app\models\Region;
use app\models\Azs;
$region = Region::find()->all();


?>
<br>
<br>
<h4>Добавить бензовоз</h4>

<form method="POST" style="max-width: 600px">
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        <div style="width: 46%">
            <label for="region" class="col-form-label">Место локации</label>
            <select style="appearance: auto; -webkit-appearance: auto;" class="form-control"name="region">
                <?php foreach($region as $a):?>
                    <option value="<?php echo $a->name;?>"><?php echo $a->name;?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div style="width: 46%">
            <label for="state" class="col-form-label">Статус</label>
            <select style="appearance: auto; -webkit-appearance: auto;" name="state" class="form-control">
                <option value="свободен">свободен</option>
                <option value="занят">занят</option>
            </select>
        </div>
        <div style="width: 46%">
            <label for="mark" class="col-form-label">Марка</label>
            <input type="text" class="form-control" name="mark">
        </div>
        <div style="width: 46%">
            <label for="vol" class="col-form-label">Общий объем</label>
            <input type="text" class="form-control" name="vol">
        </div>
        <div style="width: 30%">
            <label for="sec1" class="col-form-label">Объем 1 секции</label>
            <input type="text" class="form-control" name="sec1">
        </div>
        <div style="width: 30%">
            <label for="sec2" class="col-form-label">Объем 2 секции</label>
            <input type="text" class="form-control" name="sec2">
        </div>
        <div style="width: 30%">
            <label for="sec3" class="col-form-label">Объем 3 секции</label>
            <input type="text" class="form-control" name="sec3">
        </div>
        <div style="width: 30%">
            <label for="sec4" class="col-form-label">Объем 4 секции</label>
            <input type="text" class="form-control" name="sec4">
        </div>
        <div style="width: 30%">
            <label for="sec5" class="col-form-label">Объем 5 секции</label>
            <input type="text" class="form-control" name="sec5">
        </div>
        <div style="width: 30%">
            <label for="sec6" class="col-form-label">Объем 6 секции</label>
            <input type="text" class="form-control" name="sec6">
        </div>
    </div>
    <br><br>
    <input type="submit" class="btn btn-success" value="Добавить">
</form>