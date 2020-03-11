<?php  
session_start();
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}
    require 'asset/connection.php';

    $selectCategories = " SELECT DISTINCT `category` FROM `category`";
    $selectunits = " SELECT DISTINCT `unit` FROM `units`";

    $CategoriesResult = mysqli_query($conn,$selectCategories);
    $selectunitsResult = mysqli_query($conn,$selectunits);

    $CategoriesResult2 = mysqli_query($conn,$selectCategories);
    $selectunitsResult2 = mysqli_query($conn,$selectunits);
    
    
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
    <title>Categary</title>
  </head>
  <body>
      <!-- Navigation bar & Headder -->
      <?php 
   if($_SESSION['user_type'] == 'Admin'){
    include 'asset/navbar.html';
   }else{
     include 'asset/navbaruser.html';
   }
   ?>
   
    
    
        <!-- Show available Categories -->
        <div class="container" style="margin-left: 250px" >            
           <div class="row">
                <div class=" col-md-6 col-sm-4" >
                    <div class="content1" >                       
                          <label class="lbl1" >~ Available Categories ~</label>
                          <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; " >
                              <?php                              
                                while($row = mysqli_fetch_assoc($CategoriesResult))
                                {
                                    foreach($row  as $x ){
                                       echo $x.", "; 
                                    }                      
                                }                     
                              ?>
                          </label>
                      </div>                   
                </div> 
                <div class="col-md-6 col-sm-4">
                    <div class="content1">
                      
                      <label class="lbl1" >~ Available Units ~</label>
                      <label style="font-family: 'Times New Roman', Times, serif; font-weight: bold; " >
                      <?php                              
                            while($row = mysqli_fetch_assoc($selectunitsResult))
                            {
                                foreach($row  as $x ){
                                    echo $x.", "; 
                                }                      
                            }                     
                        ?>
                      </label>       
                    </div>                   
                </div>                  
          </div>
          <!-- Add Category -->  
          <div class="row">                                        
              <div class=" col col-sm-4 col-md-6">
                 <div class="content1" >
                       <label class="lbl1">~ Add Category & Units ~</label>
                    <div class="form-row">                   
                       <div class="col-md-6 mb-3">   
                           <form action="addcategoryback.php" method="POST">                 
                              <label for="inputState" >New Category</label>  
                              <input type="text" class="form-control" name="newcategory" required>  
                              <button class="btn btn-primary " style="margin-top: 10px;" type="submit" name="addcat">Add </button>                                           
                           </form>
                       </div>
                       <div class="col-md-6 mb-3">  
                          <form action="addcategoryback.php" method="POST">                 
                              <label for="inputState" >New Unit</label>  
                              <input type="text" class="form-control" name="newunits" required>  
                              <button class="btn btn-primary " style="margin-top: 10px;" type="submit" name="addunit">Add </button>                                           
                          </form>
                       </div>
                    </div>
                 </div>           
              </div>
              <!-- Remove Category -->
              <div class="col col-sm-4 col-md-6">        
                 <div class="content1" >
                      <label class="lbl1">~ Remove Category & Units ~</label>
               
                    <div class="form-row">                   
                       <div class="col-md-6 mb-3">
                            <form action="addcategoryback.php" method="POST">                   
                                <label for="inputState">Category</label>
                                <select id="inputState" name="rcategory" class="form-control" required >
                                <option selected disabled></option>
                                <?php
                                    while ($row = mysqli_fetch_assoc($CategoriesResult2)) {
                                    echo "<option>" . $row['category'] . "</option>";
                                     }
                                    ?>    
                                </select>
                                <button class="btn btn-primary " style="margin-top: 10px;" type="submit" name="removecat">Remove </button>
                             </form>
                        </div>   
                        <div class="col-md-6 mb-3"> 
                            <form action="addcategoryback.php" method="POST">                
                                <label for="inputState">Units</label>
                                <select id="inputState" name="runit" class="form-control" required >
                                <option selected disabled></option>
                                <?php
                                    while ($row = mysqli_fetch_assoc($selectunitsResult2)) {
                                    echo "<option>" . $row['unit'] . "</option>";
                                    }
                                ?>                          
                                </select>
                                <button class="btn btn-primary " style="margin-top: 10px;" type="submit" name="removeunit">Remove </button>
                            </form>
                       </div>                                
                    </div>             
                </div>           
              </div>
          </div>    
      </div>



    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>