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

    // $CategoriesResult2 = mysqli_query($conn,$selectCategories);
    // $selectunitsResult2 = mysqli_query($conn,$selectunits);   
    
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

    <title>Add Items</title>
  </head>
  <body>
    <!-- Navigation bar & Headder -->
    <?php include 'asset/navbar.html';?>
<div class="main_container"> 
    <!-- Add Item -->
    <div class="container " style="width: 100%;">
      <div class="row justify-content-center ">
        <div class=" col-sm-6 col-md-8">
          
          <div class="item" >
            <label class="lbl1">Add Items</label>
            <form action="additemback.php" method="POST">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group ">
                        <label for="inputState">Category</label>
                        <select id="inputState" name="category" class="form-control" required>
                          <option disabled selected></option>
                          <?php
                            while ($row = mysqli_fetch_assoc($CategoriesResult)) {
                              echo "<option>" . $row['category'] . "</option>";
                          }
                         ?>    
                        </select>
                    </div>
                </div>  
                <div class="col-md-6 mb-3">                    
                    <label for="inputState" >Brand</label>  
                    <input type="text" class="form-control" name="brand">                                             
                </div>




              </div>
          <div class="form-row">
                <div class="col-md-3 mb-3">                    
                  <div class="input-group-prepend">
                      <label for="inputState">Quantity</label>                          
                  </div>
                     <input type="number" class="form-control" name="quantity" aria-label="Amount (to the nearest dollar)" required>                                             
                </div>
                <div class="col-md-3 mb-3">                    
                  <div class="input-group-prepend">
                      <label for="inputState">Amount</label>                          
                  </div>
                     <input type="number" class="form-control" name="amount" aria-label="Amount (to the nearest dollar)">                                             
                </div>
            <div class="col-md-3 mb-3">
              <div class="form-group ">
                  <label for="inputState">Units</label>
                  <select id="inputState" name="units" class="form-control" required >
                    <option disabled selected></option>
                    <?php
                            while ($row = mysqli_fetch_assoc($selectunitsResult)) {
                              echo "<option>" . $row['unit'] . "</option>";
                          }
                         ?>       
                  </select>
              </div>
            </div>          
            <div class="col-md-3 mb-3">
                  <div class="form-group ">
                      <label for="inputState">Status</label>
                      <select id="inputState" name="status" class="form-control" required >
                        <option selected></option>
                        <option>Used</option>
                        <option>Brand New</option>                                              
                      </select>
                  </div>
            </div> 
          </div>
          <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-group ">
                    <label for="inputState">Action</label>
                    <select id="inputState" name="action" class="form-control" required >
                      <option selected></option>
                      <option>Stock</option>
                      <option>Sale</option>   
                      <option>Destroy</option>                                             
                    </select>
                </div>
            </div> 
            <!--Material textarea-->
            <div class="col-md-9 mb-3">
              <label for="description">Description</label>
              <textarea class="form-control z-depth-1" name="description" id="description" rows="3" cols="50" placeholder="Description..."></textarea>
            </div>
         </div>
            <button class="btn btn-primary " style="margin-top: 10px;" type="submit" name="additem">Add Item</button>
            </form>
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