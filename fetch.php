
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
$query = "SELECT * FROM item ORDER BY item_id DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">User Details</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Name</th>
  <th width="35%">Email</th>
  <th width="35%">Phonenumber</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["item_name"].'</td>
  <td>'.$row["item_email"].'</td>
  <td>'.$row["item_phonenumber"].'</td>
  
 </tr>
 ';
}
$output .= '</table>';
echo $output;

?>
<!-- <a href="home.php"><h2><- Back</h2> </a> -->
<button type="button" class="btn btn-light"><a href="home.php"><b>[Back]</b></a></button>