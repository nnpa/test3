
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="/web/css/ion.calendar.css">
<script type="text/javascript" src="/web/js/moment-with-locales.js"></script>

<script type="text/javascript" src="/web/js/ion.calendar.min.js"></script>


<?php 
use app\models\Types;
use app\models\Azs;
use app\models\Region;

$azs = Azs::find()->all();
$types = Types::find()->all();
$region = Region::find()->all();

?>
<br>
<br>
<script type="text/javascript">
$( document ).ready(function() {
    

    $('#region').on('change', function() {
        $.get( "/logist/ajaxazs?id=" + this.value, function( data ) {
            console.log(data);
          $( "#azs" ).html( data );
        });
    });
});
</script>
<h4>Разместить заявку на перевозку нефтепродуктов</h4>
<form method="POST" style="max-width: 600px">

    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        <div style="width: 30%">
            <label for="region" class="col-form-label">Откуда</label>
            <select class='form-control' style='appearance: auto; -webkit-appearance: auto;' id="region">
                <?php foreach($region as $a):?>
                <option value="<?php echo $a->id;?>"><?php echo $a->name;?></option>
                <?php endforeach;?>
            </select> 
        </div> 
        <div id="azs" style="width: 30%; padding-top: 38px;">
        <?php         
            $r = array_key_first($region);
            $r = $region[$r];
            $azs = Azs::find()->where(["region_id" => $r->id])->all();
            $out = "<select class='form-control' style='appearance: auto; -webkit-appearance: auto;' name='from'>";
            foreach ($azs as $a){
                $out .= "<option value='".$a->name."'>" . $a->name . "</option>";
            }

            $out .= "</select>";
            echo $out;
        ?>           
        </div>
        <div style="width: 30%">
            <label for="to" class="col-form-label">Куда</label>
            <input type="text" class="form-control" name="to">
        </div>
        <div style="width: 30%">
            <label for="type" class="col-form-label">Номенклатура</label>
            <select style="appearance: auto; -webkit-appearance: auto;" class="form-control" name="type">
                <?php foreach($types as $a):?>
                <option value="<?php echo $a->name;?>"><?php echo $a->name;?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div style="width: 30%">
            <label for="vol" class="col-form-label">Объем</label>
            <input type="text" class="form-control" name="vol">
        </div>
        <div style="width: 30%">
            <label for="to_date" class="col-form-label">Дата налива</label>
            <input class="form-control" style="appearance: auto; -webkit-appearance: auto;" class="myInput" name="to_date" id="myDatePicker-1" data-lang="ru" data-years="2023-2025" data-sundayfirst="false" />
        </div>
    </div>
    <br>

    <script type="text/javascript" >
    
    $("#myDatePicker-1").ionDatePicker({
        lang: "ru",
        sundayFirst: false,
        years: "50",
        startDate: '<?php echo date("d.m.Y");?>',
        format: "DD.MM.YYYY"
        
    });

    </script>
    <br>
    <br>
<input type="submit" class="btn btn-success" value="Добавить">
</form>