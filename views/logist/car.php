<br>
<br>
<a href="/logist/caradd" class="btn btn-success">Добавить бензовоз</a>
<br>
<br>
<table style="padding-top:10px">
    <thead>
        <tr>
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

            <th>Редактировать</th>

            <th>Удалить</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($car as $a):?>
        <tr>
            <td><?php echo $a->region;?></td>
            <td><?php echo $a->mark;?></td>
            <td><?php echo $a->vol;?></td>
            <td><?php echo $a->sec1;?></td>
            <td><?php echo $a->sec2;?></td>
            <td><?php echo $a->sec3;?></td>
            <td><?php echo $a->sec4;?></td>
            <td><?php echo $a->sec5;?></td>
            <td><?php echo $a->sec6;?></td>
            <td><?php echo $a->state;?></td>

            <td><a href="/logist/caredit/?id=<?php echo $a->id;?>">Редактировать</a></td>

            <td><a href="/logist/cardelete/?id=<?php echo $a->id;?>">Удалить</a></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>