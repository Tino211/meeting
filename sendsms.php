<?php
$connect = new PDO("mysql:host=localhost;dbname=userforms", "root", "");
$query = "SELECT * FROM usertable ORDER BY id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Aletr your team-members</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Send Bulk SMS</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Name</th>
      <th>PhoneNumber</th>
      <th>Select</th>
      <th>Action</th>
     </tr>
     <?php
     $count = 0;
     foreach($result as $row)
     {
      $count++;
      echo '
      <tr>
       <td>'.$row["name"].'</td>
       <td>'.$row["phonenumber"].'</td>
       <td>
        <input type="checkbox" name="single_select" class="single_select" data-phonenumber="'.$row["phonenumber"].'" data-name="'.$row["name"].'" />
       </td>
       <td><button type="button" name="phonenumber_button" class="btn btn-info btn-xs phonenumber_button" id="'.$count.'" data-phonenumber="'.$row["phonenumber"].'" data-name="'.$row["name"].'" data-action="single">Send Single </button></td>
      </tr>
      ';
     }
     ?>
     <tr>
      <td colspan="3"></td>
      <td><button type="button" name="bulk_sms" class="btn btn-info phonenumber_button" id="bulk_sms" data-action="bulk">Send Bulk</button></td></td>
     </td>
    </table>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('.phonenumber_button').click(function(){
  $(this).attr('disabled', 'disabled');
  var id = $(this).attr("id");
  var action = $(this).data("action");
  var phonenumber_data = [];
  if(action == 'single')
  {
   phonenumber_data.push({
    phonenumber: $(this).data("phonenumber"),
    name: $(this).data("name")
   });
  }
  else
  {
   $('.single_select').each(function(){
    if($(this). prop("checked") == true)
    {
     phonenumber_data.push({
      phonenumber: $(this).data("phonenumber"),
      name: $(this).data('name')
     });
    }
   });
  }
  
  $.ajax({
   url:"sms.php",
   method:"POST",
   data:{phonenumber_data:phonenumber_data},
   beforeSend:function(){
    $('#'+id).html('Sending...');
    $('#'+id).addClass('btn-danger');
   },
   success:function(data){
    if(data = 'ok')
    {
     $('#'+id).text('Success');
     $('#'+id).removeClass('btn-danger');
     $('#'+id).removeClass('btn-info');
     $('#'+id).addClass('btn-success');
    }
    else
    {
     $('#'+id).text(data);
    }
    $('#'+id).attr('disabled', false);
   }
   
  });
 });
});
</script>