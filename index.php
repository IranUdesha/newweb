<?php

    session_start();
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}
    require 'asset/connection.php';
    require 'indexback.php';
  //  $query = "SELECT * FROM item";
  //  $result = mysqli_query($conn,$query);
   
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
    <link  rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> 
    
     .table.sticky th{  
         position: sticky;
         top: 0;
         /* z-index: 100; */
         background-color: white;
       }

     </style>
  
    
    <!-- <script src="js/main.js"></script> -->
    <script src="js\main.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   

    <title>Home</title>
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
   
<div class="main_container"> 
   
  <div class="card"style="margin-top: 15px">

  <div class="card-header ">
  <h6 class="text-center font-weight-bold text-uppercase py-4">Search Method</h6>
  
               
  <form action="index.php" method="POST">
      <div class="row" >
         <div class="col mb-3">
                    <div class="form-group ">
                        <label for="inputState">Category</label>
                        <select id="inputState" name="scategory" class="form-control" title="Select the Category that you want to search">
                          <option selected></option>
                          <?php
                            while ($row = mysqli_fetch_assoc($CategoriesResult)) {
                              echo "<option>" . $row['category'] . "</option>";
                          }
                         ?>    
                        </select>
                    </div>
          </div>      
          <div class="col mb-3">
          
               <div class="form-group ">
                   <label for="inputState">Status</label>
                      <select id="inputState" name="sstatus" class="form-control" title="Select the Status that you want to search">
                         <option selected></option>
                         <option>Used</option>
                         <option>Brand New</option>                                              
                      </select>
               </div>     
          </div>
         
          <div class="col mb-3">
                <div class="form-group ">
                    <label for="inputState">Action</label>
                    <select id="inputState" name="saction" class="form-control" title="Select the Action that you want to search" >
                      <option selected></option>
                      <option>Stock</option>
                      <option>Sale</option>   
                      <option>Destroy</option>                                             
                    </select>
                </div>
          </div>
          <div class="col-md-4 mb-3 " >
             <div class="row "  >
                <div class="col">         
                    <label>From Date</label>
                    <input type="date" name="sfromDate" title="Select the Date that you want to search From">                                  
                </div>  
                <div class=" col">
                  <label>To Date</label>
                  <input type="date" name="stoDate" title="Select the Date that you want to search To">
                </div>  
                
             </div> 
          </div>
          <div class="col">
            <div >
                  <input type="submit" name="search" class="btn btn-primary" value="Search" title="Click The button to get the Result">
            </div>
          </div>
      </div>
    </form>
   
          <div>
              <input class="form-control" id="type" type="text" placeholder="Search.." title="Enter the Keyword that You want to search">
          </div>                    
  </div>

  <div class="card-header">
      <div class="row">
          <div class="col">
            <!-- Display Sorted method -->
               <label title="Display the Sorting Type "><b>Sorted By : </b><?php echo $FullItem." ".$scategory." ".$sstatus." ".$saction." ".$FilterDate?></label>
                 
          </div>
           <div class="col">
             <!-- Display Number of rows of result -->
           <p style="font-weight: bold" title="Display the Number of Results">Number Of Rows: <span style="color: red"><?php echo " ".$CurrentRowCount?></span></p>             
            </div>
           
       </div>
          
  </div>
    
    <div class="card-body">
  
      <!-- <span class="table-add float-right mb-3 mr-2"><a href="additem.php" class="text-success">
        <i  class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span> -->

         <table class="table sticky table-bordered table-responsive-md table-striped text-center"  >
           <thead >
               <tr >
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
                  <th class="text-center">Modified Date</th>
                  <?php 
                     if($_SESSION['user_type'] == 'Admin'){
                     include 'asset/editremoveheader.html';
                     }
                  ?>
                  
              </tr>
                  <?php
                        //fetch data from database
                    while($row = mysqli_fetch_assoc($selectItemDataResult))
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
                        $modified_date = $row['modified_date'];
                 ?>
          </thead>
        <tbody id="datatable" aria-hidden="true">
          <tr>
            <!-- assign retrive values to the columns -->
          <td class="pt-3-half" contenteditable="true"><?php echo  $item_id ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $sr_number ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $category ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $brand ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $quantity ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $amount ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $units ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $status ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $action ?></td>
            <td class="pt-3-half" contenteditable="true" style="word-break: break-all; "><?php echo  $description ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $date ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo  $modified_date ?></td>
            
            <?php 
              if($_SESSION['user_type'] == 'Admin'){
               include 'asset/editremove.html';
              }
            ?>
        
          </tr>
           <?php
                }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>   

 <script> 
// $(document).ready(function(){
//   $("#myInput").click(function() {

//     var value = $(this).val().toLowerCase();
//     $("#datatable tr").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });

//universal search bar
$(document).ready(function(){
  $("#type").on("keyup", function()  {
    var value = $(this).val().toLowerCase();
    $("#datatable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script> 
<script>
  // selection activation of nav bar
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