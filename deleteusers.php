
<?php
session_start();   
    require 'asset/connection.php';

   $query = "SELECT * FROM login where user_type = 'User'";
   $result = mysqli_query($conn,$query);

    
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
	
    <title>Delete User</title>
  </head>
  <body>

   <!-- Navigation bar & Headder -->
   <?php include 'asset/navbar.html';?>
    
    <div class="main_container"> 
        <div class="container" style="margin-top: 50px">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Currently Available User Account </h3>
 
        <table class="table table-bordered" align="center" border="1px" style="width: 100%">
       
            <tr >
                <th class=" bg-light text-center" >ID</th>
                <th class="bg-light text-center">First Name</th>
                <th class="bg-light text-center">Last Name</th>
                <th class="bg-light text-center">Username</th>
                <th class="bg-light text-center">E-Mail</th>
                <th class="bg-light text-center">Date and Time</th>
                <th class="bg-light text-center">Delete</th>

            </tr>
            <?php
                while($row=mysqli_fetch_array($result))
                {              
            ?>
                <tr>
                    <td class="bg-light"><?php echo $row['u_id'] ?>  </td>
                    <td class="bg-light"><?php echo $row['fname'] ?>  </td>
                    <td class="bg-light"><?php echo $row['lname'] ?>  </td>
                    <td class="bg-light"><?php echo $row['username'] ?>  </td>
                    <td class="bg-light"><?php echo $row['email'] ?>  </td>
                    <td class="bg-light"><?php echo $row['date'] ?>  </td>
                    <td class="bg-light"><span class="table-remove"> <a class="btn btn-danger btn-rounded btn-sm my-0" href="deleteuserback.php?uid=<?php echo $row['u_id'] ?>">Delete</a></span> </td>
                                        
                </tr>
                <?php
                }
                ?>
        </table>

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