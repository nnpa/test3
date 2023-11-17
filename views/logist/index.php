<br>
<br>

<div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
    <h1 style="font-size: 30px">Свободные бензовозы/битумовозы</h1>
    <div>
    <?php if(!Yii::$app->user->isGuest):?>
    <a href="/logist/cargo" class="btn btn-success">Поиск транспорта</a>
    <a href="/logist/car" class="btn btn-success">Мои транспорт</a>
    <?php endif;?>
    </div>
</div>
<br>
<br>
<h4>Заявки</h4>
<table style="padding-top:5px">
    <thead>
        <tr>
            <th>Откуда</th>
            <th>Куда</th>
            <th>Нефтепродукты</th>
            <th>Объем</th>
            <th>Дата</th>
            <th>Компания</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cargo as $a):?>
        <tr>
            <td><?php echo $a->from;?></td>
            <td><?php echo $a->to;?></td>
            <td><?php echo $a->type;?></td>
            <td><?php echo $a->vol;?></td>
            <td><?php echo date('d.m.Y', $a->to_date);?></td>
            <td><?php echo($a->getFirm() != null)?'<a href="https://priceoil.ru/company/'.$a->getFirm()->url.'">' . $a->getFirm()->name .'</a>': ''?></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<h4>Бензовозы</h4>
<table style="padding-top:5px">
    <thead>
        <tr>
            <th>Дата</th>
            <th>Место локации</th>
            <th>Марка</th>
            <th>Объем</th>
            <th>Объем секции 1</th>
            <th>Объем секции 2</th>
            <th>Объем секции 3</th>
            <th>Объем секции 4</th>
            <th>Объем секции 5</th>
            <th>Объем секции 6</th>
            <th>Статус</th>

            <th>Компания</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($car as $a):?>
        <tr>
            <td>
                <?php echo date('d.m.Y', $a->create_time);?>
            </td>
            <td>
                <?php echo $a->region;?>
            </td>
            <td>
                <?php echo $a->mark;?>
                <br>

            </td>
            <td><?php echo $a->vol;?></td>
            <td><?php echo $a->sec1;?></td>
            <td><?php echo $a->sec2;?></td>
            <td><?php echo $a->sec3;?></td>
            <td><?php echo $a->sec4;?></td>
            <td><?php echo $a->sec5;?></td>
            <td><?php echo $a->sec6;?></td>
            <td><?php echo $a->state;?></td>

            <td><?php echo($a->getFirm() != null)?'<a href="https://priceoil.ru/company/'.$a->getFirm()->url.'">' . $a->getFirm()->name .'</a>': ''?></td>

        </tr>
        <?php endforeach; ?>

    </tbody>
</table>