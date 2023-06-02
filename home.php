<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>


      
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
        left: 50%;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
        font-size: 20px;
    }
    
    
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }

    h3{
        position: absolute;
        top: 20%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        color: white;
        font-weight: 600;
        
    }
    h2{
      font-weight:600;
      font-family: 'Poppins', sans-serif;
      left:50%;
      font-size:23px;
      
    }

    .link-btn{
      
   display: inline-block;
   padding:1rem 3rem;
   border-radius: .5rem;
   background-color: var(--blue);
   cursor: pointer;
   font-size: 1.5rem;
   color:var(--white);
}



form{
  background: rgba(27,31,34);
  width: 640px;
  margin: 65px auto;
  max-width: 97%;
  border-radius: 4px;
  padding: 55px 30px;
  border: 1px solid white;
  text-transform: uppercase;
}

form h2{
  letter-spacing: 5px;
  border-bottom: 1px solid white;
  display: inline-block;
  padding-bottom: 8px;
  margin-bottom: 32px;
  color:white;
}

form .half{
  display: flex;
  justify-content: space-between;
}

form .half .item{
  display: flex;
  flex-direction: column;
  margin-bottom: 24px;
  width: 48%;
}

form label{
  display: block;
  font-size: 13px;
  letter-spacing: 3.5px;
  margin-bottom: 16px;
}

form .item input{
  border-radius: 4px;
  border: 1px solid white;
  outline: 0;
  padding: 16px;
  width: 100%;
  height: 44px;
  background:white;
  font-size: 17px;
}

form .full{
  margin-bottom: 24px;
}

form .action input{
  background: white;
  color: black;
  border-radius: 4px;
  border: 1px solid black;
  cursor: pointer;
  font-size: 13px;
  height: 44px;
  letter-spacing: 3px;
  padding: 0 20px 0 22px;
}
form .item{
    color:white;
}

form .item input:focus{
  background: white;
}

@media (max-width: 480px){
  form .half{
    flex-direction: column;
  }
  form .half .item, form .action input{
    width: 100%;
  }
}


    </style>
</head>
<body>
<?php include "meetinginsert.php"; ?>

<header>

    <nav class="navbar">
   
   <a class="navbar-brand" href="#">Meeting Scheduler App</a>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
    
    
    <h3>Welcome <?php echo $fetch_info['name'] ?></h3>
</header> 

<div class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder"></h1>
            <p class="lead fw-normal text-white-50 mb-0">
                <button  class="btn btn-sm btn-primary" type="button" id="showDialog" >Schedule Meeting Now</button>
            </p>
        </div>
    </div>
</div>
</div>
<button type="button"><a href="realtable.php"><h2>Edit Participants Details</h2> </a></button>

<dialog id="favDialog">

  <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" action="sendemail.php" method="post" >
        
    <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
      
 <div class="title">
        <h2>Meeting Scheduler Form:</h2>
      </div>
      <div class="half">
        <div class="item">
          <label for="">Meeting Title:</label>
          <input type="text" name="title" required value="">
        </div>

        <div class="item">
          <label for="">Meeting Agenda:</label>
          <input type="text" name="agenda" required value="">
        </div>
      </div>

      <div class="full">
        <div class="item">
          <label for="">Meeting Type(Online/Physical):</label>
          <input type="text" name="type" required value="">
        </div>
        </div>

        <div class="full">
        <div class="item"> 
          <label for="">Additional Announcements(if any):</label>
          <input type="text" name="announcement" >
        </div>
      </div>

        <div class="full">
        <div class="item">
          <label for="">Meeting Date:</label>
          <input type="datetime-local" name="datee" required value="">
        </div>
        </div>

        <div class="full">
        <div class="item">
          <label for="">Upload Previous Minutes:</label>
          <input type="file" enctype="multipart/form-data" name="file">
        </div>
        </div>

      </div>
      <div class="action">
        <input type="submit" name = "schedule" value =  "SCHEDULE" >
      </div>    
      

   
  </form>
  <button  type="button" id="showDialog" ><a href="home.php">Exit</a></button>
</dialog>
<!-- </section> -->


<output></output>
</body>
</html>

<script>
const showButton = document.getElementById('showDialog');
const favDialog = document.getElementById('favDialog');
const outputBox = document.querySelector('output');
const selectEl = favDialog.querySelector('select');
const confirmBtn = favDialog.querySelector('#confirmBtn');

// "Show the dialog" button opens the <dialog> modally
showButton.addEventListener('click', () => {
    favDialog.showModal();
});
// "Favorite animal" input sets the value of the submit button
selectEl.addEventListener('change', (e) => {
  confirmBtn.value = selectEl.value;
});
// "Confirm" button of form triggers "close" on dialog because of [method="dialog"]
favDialog.addEventListener('close', () => {
  
});
</script>


 