<?php
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
    
    
    <title>Categary</title>
  </head>
  <body>
    <!-- Navigation bar & Headder -->
    <header>
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" style="text-align: center;" href="index.html">Custom Stock Room</a>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
          </li>
        </ul>
      </nav>
  
      <div class="container-fluid">
        <div class="row">
          <nav class="col-sm-2 d-md-block bg-light d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" href="index.html">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                  </a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link" href="additem.html">
                    <span data-feather="shopping-cart"></span>
                    Add Item
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Item Update
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Add Categary 
                  </a>
                </li>             
              </ul>
  
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Setting</span>
                <a class="d-flex align-items-center text-muted" href="#">
                  <span data-feather="plus-circle"></span>
                </a>
              </h6>
              <ul class="nav flex-column mb-2">
                <li class="nav-item">
                  <a class="nav-link" href="adduser.html">
                    <span data-feather="layers"></span>
                    Add Users
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="editprofile.html">
                    <span data-feather="file"></span>
                    Edit Profile
                  </a>
                </li>                
              </ul>
            </div>
          </nav>  
        </div>
      </div>      
    </header>
    
    
        <!-- Show available Categories -->
        <div class="row" >
            <div class="container" style="width: 50%; position: relative; top: 0px; margin-bottom:30px " >
                <div class="row justify-content-center ">
                  <div class=" col-sm-4 col-md-8">
                    <div class="conbox" style="margin: 0px; padding-top: 0px">
                      <label class="lbl1" style="margin: 0px; padding-top: 0px">~ Available Categaries ~</label>
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
                </div>    
              </div>
        </div>
      <div class="row">
        <div class="container"style="width: 50%; position: relative; top: 100px; margin-bottom:30px " >
                <div class="row justify-content-center ">
                  <div class=" col-sm-4 col-md-8">
                    <div class="conbox" style="margin: 0px; padding-top: 0px">
                      <label class="lbl1" style="margin: 0px; padding-top: 0px">~ Available Units ~</label>
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
              </div>
        </div>
       
     <div class="row">
              <!-- Add Category -->
        <div class="container bg " style="width: 50%; position: relative; top: 200px; ">
            <div class="row justify-content-center ">
               <div class=" col-sm-6 col-md-8">
                 <div class="conbox" >
                   <label class="lbl1">~ Add Categary & Units ~</label>
                     
                 <div class="form-row">                   
                   <div class="col-md-6 mb-3">   
                   <form action="addcategoryback.php" method="POST">                 
                       <label for="inputState" >New Categary</label>  
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
             </div>    
        </div>
     </div>
     <div class="row">
        <!-- Remove Category -->
  <div class="container bg " style="width: 50%; position: relative; top: 470px; ">
      <div class="row justify-content-center ">
         <div class=" col-sm-6 col-md-8">
           <div class="conbox" >
             <label class="lbl1">~ Remove Categary ~</label>
               
           <div class="form-row">                   
                <div class="col-md-6 mb-3">

                <form action="addcategoryback.php" method="POST">                   
                 <label for="inputState">Categary</label>
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
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>