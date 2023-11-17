<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
// A $( document ).ready() block.
$( document ).ready(function() {
    $( "#send" ).on( "click", function() {
      var cat = $( "#category" ).val();
      var text = $( "#text" ).val();
      var url = "queue/accept?userName=user&categoryId="+ cat +"&text="+text;
      $.get( url, function( data ) {

      });
    } );
    function getMessages() {
      $.get( "site/getmessages", function( data ) {
            var obj = jQuery.parseJSON(data);
            var text = '<div class="row">';
            $.each(obj, function(key,value) {
              text = text + value["userName"] + " " +value["category"] ;
              var timestampInMilliSeconds = value["createdAt"] *1000; //as JavaScript uses milliseconds; convert the UNIX timestamp(which is in seconds) to milliseconds.
              var date = new Date(timestampInMilliSeconds); //create the date object
              var day = (date.getDate() < 10 ? '0' : '') + date.getDate(); //adding leading 0 if date less than 10 for the required dd format
              var month = (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1); //adding leading 0 if month less than 10 for mm format. Used less than 9 because javascriptmonths are 0 based.
              var year = date.getFullYear(); //full year in yyyy format
              text = text + " "+ day + "." + month + "." + year + " <br>" + value["content"] + "<hr>";
              
            }); 
            text = text + "</div>"
            $( "#twits" ).html(text);

      });
    }
    setInterval(getMessages, 1000);
});

</script>
Username:  user<br>
Category 
<select id="category">
    <?php foreach($categories as $category):?>
        <option value="<?php echo $category->id;?>">
            <?php echo $category->title;?>
        </option>
    <?php endforeach;?>
</select><br>
text<br>
<input type="text" id="text"><br>
<input type="submit" id="send" value="send">


<div id="twits">
    
    <?php foreach($twits as $twit):?>
    <div class="row">
        <?php echo $twit->username;?> <?php echo $twit->category->title;?> <?php echo date('d.m.Y',$twit->createdAt);?> <br>
        <?php echo $twit->content;?>

    </div>
    <hr>
    <?php endforeach;?>
</div>