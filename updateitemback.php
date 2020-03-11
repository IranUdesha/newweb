<?php

include'asset/connection.php';
    if(isset($_POST['additem'])){

        $item_id = $_GET['itemid'];
        //get input values from front end
       $srnum = $_POST['srnumber'];
       $category = $_POST['category'];
       $brand = $_POST['brand'];
       $quantity = $_POST['quantity'];
       $amount = $_POST['amount'];
       $status = $_POST['status'];
       $action = $_POST['action'];
       $description = $_POST['description'];
       $units = $_POST['units'];


    $sql1 = "UPDATE item  SET sr_number ='$srnum', category='$category', brand='$brand', quantity='$quantity', amount='$amount', units='$units', status= '$status', action='$action', description= '$description', modified_date = CURRENT_TIMESTAMP    WHERE item_id='$item_id'";
          
        $result = mysqli_query($conn,$sql1);
        // echo mysqli_error($conn);
        if($result == 1){
                   
            echo '<script type="text/javascript">';
            echo ' alert("Item Updated Successfully"); window.location.href = "index.php";';  //showing an alert box and redirect to additem.php
            echo '</script>';
        }else{
            // echo mysqli_error($conn);
            echo '<script type="text/javascript">';
            echo ' alert("Failed"); window.location.href = "index.php";';  //showing an alert box and redirect to additem.php
            echo '</script>';
        }

    }else{
        header("Location:index.php");
        exit();
    }

?>