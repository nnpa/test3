<br>
<br>
<a href="/logist/cargoadd" class="btn btn-success">Добавить заявку</a>
<br>
<br>
<table style="padding-top:10px">
    <thead>
        <tr>
            <th>Откуда</th>
            <th>Куда</th>
            <th>Номенклатура</th>
            <th>Объем</th>
            <th>Дата</th>
            <th>Удалить</th>

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
            <td><a href="/logist/cargodelete/?id=<?php echo $a->id;?>">Удалить</a></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>

