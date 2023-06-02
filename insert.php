<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["item_name"]))
{
 $item_name = $_POST["item_name"];
 $item_email = $_POST["item_email"];
 $item_phonenumber = $_POST["item_phonenumber"];
 
 $query = '';
 for($count = 0; $count<count($item_name); $count++)
 {
  $item_name_clean = mysqli_real_escape_string($connect, $item_name[$count]);
  $item_email_clean = mysqli_real_escape_string($connect, $item_email[$count]);
  $item_phonenumber_clean = mysqli_real_escape_string($connect, $item_phonenumber[$count]);
  
  if($item_name_clean != '' && $item_email_clean != '' && $item_phonenumber_clean != '' )
  {
   $query .= '
   INSERT INTO item(item_name, item_email, item_phonenumber) 
   VALUES("'.$item_name_clean.'", "'.$item_email_clean.'", "'.$item_phonenumber_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>
