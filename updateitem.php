<?php
    require 'asset/connection.php';
    $selectCategories = " SELECT DISTINCT `category` FROM `category`";
    $selectunits = " SELECT DISTINCT `unit` FROM `units`";

    $CategoriesResult = mysqli_query($conn,$selectCategories);
    $selectunitsResult = mysqli_query($conn,$selectunits);

    $u_id = $_GET['itemid'];

    $query = "SELECT * FROM item where item_id='$u_id'";
    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result)){
        $sr_number = $row['sr_number'];
        $category = $row['category'];
        $sr_number = $row['sr_number'];
        $brand = $row['brand'];
        $quantity = $row['quantity'];
        $amount = $row['amount'];
        $units = $row['units'];
        $status = $row['status'];
        $action = $row['action'];
        $description = $row['description'];

    }
    
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


    <title>Update Items</title>
  </head>
  <body>
    <!-- Navigation bar & Headder -->
    <?php include 'asset/navbar.html';?>
<div class="main_container"> 
    <!-- Add Item -->
    <div class="container bg " style="width: 80%;">
      <div class="row justify-content-center ">
        <div class=" col-sm-6 col-md-8">
          
          <div class="item" >
            <label class="lbl1">Update Items</label>
            <form action="updateitemback.php?itemid=<?php echo $u_id ?>" method="POST">
              <div class="form-row">
              <div class="col-md-4 mb-3">                    
                    <label for="inputState" >SR Number</label>  
                    <input type="text" class="form-control" name="srnumber" value="<?php echo $sr_number ?>" required>                                             
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group ">
                        <label for="inputState">Category</label>
                        <select id="inputState" name="category" class="form-control"  required>
                          <option ><?php echo $category ?></option>
                          <?php
                            while ($row = mysqli_fetch_assoc($CategoriesResult)) {
                              echo "<option>" . $row['category'] . "</option>";
                          }
                         ?>    
                        </select>
                    </div>
                </div>  
                <div class="col-md-4 mb-3">                    
                    <label for="inputState" >Brand</label>  
                    <input type="text" class="form-control" name="brand" value="<?php echo $brand ?>">                                             
                </div>




              </div>
          <div class="form-row">
                <div class="col-md-3 mb-3">                    
                  <div class="input-group-prepend">
                      <label for="inputState">Quantity</label>                          
                  </div>
                     <input type="text" class="form-control" name="quantity" aria-label="Amount (to the nearest dollar)" value="<?php echo $quantity ?>" required>                                             
                </div>
                <div class="col-md-3 mb-3">                    
                  <div class="input-group-prepend">
                      <label for="inputState">Amount</label>                          
                  </div>
                     <input type="text" class="form-control" name="amount" aria-label="Amount (to the nearest dollar)" value="<?php echo $amount ?>">                                             
                </div>
            <div class="col-md-3 mb-3">
              <div class="form-group ">
                  <label for="inputState">Units</label>
                  <select id="inputState" name="units" class="form-control" required >
                    <option ><?php echo $units ?></option>
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
                        <option ><?php echo $status ?></option>
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
                      <option><?php echo $action ?></option>
                      <option>Stock</option>
                      <option>Sale</option>   
                      <option>Destroy</option>                                             
                    </select>
                </div>
            </div> 
            <!--Material textarea-->
            <div class="col-md-9 mb-3">
              <label for="description">Description</label>
              <textarea class="form-control z-depth-1" name="description" id="description" rows="3" cols="50" placeholder="Description..."><?php echo $description ?></textarea>
            </div>
         </div>
            <button class="btn btn-primary " style="margin-top: 10px;" type="submit" name="additem">Update</button>
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