<?php
session_start();    
if(!isset($_SESSION)){
    exit();
}
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

?>


<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="css/util.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	
    <title>Edit Profile</title>
  </head>
  <body>
     <!-- Navigation bar & Headder -->
     <?php include 'asset/navbar.html';?>
    
 <div class="main_container"> 
         <!-- Edit Profile-->
    <div class="container" style="width: 100%;">
      <div class=" row  justify-content-center">
        <div class=" col-sm-6 col-md-8 ">
          <div class="item" >
            <label class="lbl1">User Registration Form</label>
            <form action="editpback.php" method="POST" >
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="validationDefault01">First name</label>
                  <input type="text" class="form-control" id="validationDefault01" name="fname" value="<?php echo $fname ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationDefault02">Last name</label>
                  <input type="text" class="form-control" id="validationDefault02" name="lname" value="<?php echo $lname ?>" required>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="validationDefaultUsername">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <!-- <span class="input-group-text" id="inputGroupPrepend2">@</span> -->
                    </div>
                    <input type="text" class="form-control" id="validationDefaultUsername" name="username" title="Use Simple Letters" aria-describedby="inputGroupPrepend2" value="<?php echo $username ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="inputPassword4">Current Password</label>
                  <input type="password" class="form-control" id="inputPassword4" name="password">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="inputPassword4">New Password</label>
                  <input type="password" class="form-control" id="inputPassword4" name="npassword">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="inputPassword4">Confirm Password</label>
                  <input type="password" class="form-control" id="inputPassword4" name="cpassword">
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-8 mb-6">
                  <label for="validationDefault03">E-mail</label>
                  <input type="email" class="form-control" id="validationDefault03" name="email" value="<?php echo $email ?>" required>
                </div>
                               
              </div>         
              <button class="btn btn-primary " style="margin-top: 10px;" type="submit" name="update">Update</button>
            </form>
          </div>
         
        </div>
      </div>    
    </div>
    </div>
 
   

       
    <script>
		$(document).ready(function(){
			$(".siderbar_menu li").click(function(){
			  $(".siderbar_menu li").removeClass("active");
			  $(this).addClass("active");
			});

			$(".hamburger").click(function(){
			  $(".wrapper").addClass("active");
			});

			$(".close, .bg_shadow").click(function(){
			  $(".wrapper").removeClass("active");
			});
		});
	</script>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>