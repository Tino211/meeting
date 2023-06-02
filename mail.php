<?php
//mail.php
/* $data = mysql_query("SELECT * FROM meetingscheduler ORDER BY ID DESC LIMIT 1")
or die(mysql_error());

while($info = mysql_fetch_array( $data ))
{
Print "<tr>";
Print "<th>ID:</th> <td>".$info['ID'] . "</td> ";
Print "<th>Title:</th> <td>".$info['title'] . "</td> ";
Print "<th>Agenda:</th> <td>".$info['agenda'] . " </td></tr>";
}
Print "</table>";

mysql_close();
 */

//end print the database on form processing page


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require  "meetinginsert.php";



if(isset($_POST['email_data']));
{

 require 'class/class.phpmailer.php';
 
 $output = '';
 foreach($_POST['email_data'] as $row)
 {
  $mail = new PHPMailer;
  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = "ssl://smtp.gmail.com";  //Sets the SMTP hosts of your Email hosting, this for Godaddy
  $mail->Port = '465';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'tinotendakatso@gmail.com';     //Sets SMTP username
  $mail->Password = 'awrpvjhhadtnfotw';     //Sets SMTP password
  $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = 'tinotendakatso@gmail.com';   //Sets the From email address for the message
  $mail->FromName = 'Tino';     //Sets the From name of the message
  $mail->AddAddress($row["email"], $row["name"]); //Adds a "To" address
  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML
  $mail->Subject ='The agenda of the meeting is:'.$agenda; //Sets the Subject of the message
  //An HTML or plain text message body
   $mail->Body = 
  '<p>Meeting Alert:</p>'
 ;  
 
    
 
 
  $result = $mail->Send();      //Send an Email. Return true on success or false on error

  if($result["code"] == '400')
  {
   $output .= html_entity_decode($result['full_error']);
  }

 }
 if($output == '')
 {
  echo 'ok';
 }
 else
 {
  echo $output;
 }
}

?>
