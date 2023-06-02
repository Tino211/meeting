<head>
<link href="home.php" rel="form">
</head>
<?php
     
      require 'config.php';
      if(isset($_POST["schedule"])){
        $title = $_POST["title"];
        $agenda = $_POST["agenda"];
        $type = $_POST["type"];
        $announcement = $_POST["announcement"];
        $date = $_POST["datee"];
        $file = $_POST["file"];
      
       /*  $user = mysqli_query($conn, "SELECT * FROM meetingscheduler WHERE datee = '$date'");
        if(mysqli_num_rows($date) > 0){
          echo
          "
          <script> alert('Date Has Already Been Taken'); </script>
          ";
        }
        else{ */
          $query = "INSERT INTO meetingscheduler VALUES('', '$title', '$agenda', '$type', '$announcement', '$date' , '$file')";
          mysqli_query($conn, $query);
          echo
          "
          <script> alert('Meeting has been scheduled'); </script>
          ";
          header("Location:sendemail.php");
        }
      
?>