<?php
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
$query = "SELECT * FROM item ORDER BY item_id";
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
   <h3 align="center">Send Bulk Email</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Name</th>
      <th>Email</th>
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
       <td>'.$row["item_name"].'</td>
       <td>'.$row["item_email"].'</td>
       <td>
        <input type="checkbox" name="single_select" class="single_select" data-email="'.$row["item_email"].'" data-name="'.$row["item_name"].'" />
       </td>
       <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["item_email"].'" data-name="'.$row["item_name"].'" data-action="single">Send Single</button></td>
      </tr>
      ';
     }
     ?>

     <tr>
      <td colspan="3"></td>
      <td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>
     </td>
    </table>
   </div>
  </div>
  
  

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
       <td>'.$row["item_name"].'</td>
       <td>'.$row["item_phonenumber"].'</td>
       <td>
        <input type="checkbox" name="single_select" class="single_select" data-phonenumber="'.$row["item_phonenumber"].'" data-name="'.$row["item_name"].'" />
       </td>
       <td><button type="button" name="phonenumber_button" class="btn btn-info btn-xs phonenumber_button" id="'.$count.'" data-phonenumber="'.$row["item_phonenumber"].'" data-name="'.$row["item_name"].'" data-action="single">Send Single </button></td>
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

<!-- <button type="button"><a href="home.php"><h2>Back</h2> </a></button> -->
<button type="button" class="btn btn-light"><a href="home.php"><b>[Back]</b></a></button>

 </body>
</html>

<script>
$(document).ready(function(){
 $('.email_button').click(function(){
  $(this).attr('disabled', 'disabled');
  var id = $(this).attr("id");
  var action = $(this).data("action");
  var email_data = [];
  if(action == 'single')
  {
   email_data.push({
    email: $(this).data("email"),
    name: $(this).data("name")
   });
  }
  else
  {
   $('.single_select').each(function(){
    if($(this). prop("checked") == true)
    {
     email_data.push({
      email: $(this).data("email"),
      name: $(this).data('name')
     });
    }
   });
  }
  
  $.ajax({
   url:"mail.php",
   method:"POST",
   data:{email_data:email_data},
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
   url:"bulksmss.php",
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