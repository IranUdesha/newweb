<?php
    require 'asset/connection.php';

   $query = "SELECT * FROM item";
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

    <title>Home</title>
  </head>
  <body>
    <!-- Navigation bar & Headder -->
   <?php include 'asset/navbar.html';?>
   
<div class="main_container"> 
    <div class="card"style="margin-top: 50px">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
  <div class="card-body">
  
      <!-- <span class="table-add float-right mb-3 mr-2"><a href="additem.php" class="text-success">
        <i  class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span> -->

      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Item Id</th>
            <th class="text-center">SR Number</th>
            <th class="text-center">Category</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Amount</th>
            <th class="text-center">units</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
            <th class="text-center">Description</th>
            <th class="text-center">Added Date</th>
            <th class="text-center">Modefied Date</th>
            <th class="text-center">Delete</th>
            <th class="text-center">Update</th>
          </tr>
          <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $item_id = $row['item_id'];
                        $sr_number = $row['sr_number'];
                        $category = $row['category'];
                        $brand = $row['brand'];
                        $quantity = $row['quantity'];
                        $amount = $row['amount'];
                        $units = $row['units'];
                        $status = $row['status'];
                        $action = $row['action'];
                        $description = $row['description'];
                        $date = $row['date'];
                        $modefied_date = $row['modefied_date'];
                ?>
        </thead>
        <tbody>
          <tr>
          <td class="pt-3-half" contenteditable="true"><?php echo  $item_id ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $sr_number ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $category ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $brand ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $quantity ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $amount ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $units ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $status ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $action ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $description ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $date ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $modefied_date ?></td>
            
            <td>
              <span class="table-remove">
                <a class="btn btn-danger btn-rounded btn-sm my-0"  href="deleteitemback.php?itemid=<?php echo $item_id ?>">Remove</a></span>
            </td>
            <td>
              <span class="table-remove">
                <a type="button" class="btn btn-primary btn-rounded my-0" href="updateitem.php?itemid=<?php echo $item_id ?>">Edit</a></span>
            </td>
          </tr>
           <?php
                }
            ?>
        </tbody>
      </table>

    
</div>   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>