<?php

include'asset/connection.php';
    if(isset($_POST['additem'])){
        //get input values from front end
       $category = $_POST['category'];
       $brand = $_POST['brand'];
       $quantity = $_POST['quantity'];
       $amount = $_POST['amount'];
       $status = $_POST['status'];
       $action = $_POST['action'];
       $description = $_POST['description'];
       $units = $_POST['units'];

       function set_SR_ID($conn)
       // set auto increment value to zero (ALTER TABLE myTabel AUTO_INCREMENT=0);
    {       //get the next auto increment value of item_id in database
        $getLastItem_ID = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'custom_sr' AND TABLE_NAME = 'item'";

        $selectAllResult = mysqli_query($conn, $getLastItem_ID);
        $rows = mysqli_fetch_array($selectAllResult);

        $idEndNumber = $rows['AUTO_INCREMENT'];
        
        return $idEndNumber;
    }
            $currentYear = date("Y");   //get current year

            $SR_ID_Tail = set_SR_ID($conn); // get next auto increment value from above function(set_SR_ID())
            $SR_ID = "SR/".$currentYear."/".$SR_ID_Tail; // SR Number            
               
        $sql = "INSERT INTO item (sr_number,category,brand,quantity,amount,units,status,action,description,date) VALUES(' $SR_ID',' $category','$brand','$quantity',' $amount','$units','$status','$action','$description',CURRENT_TIMESTAMP)";

        $result = mysqli_query($conn,$sql);
        if($result == 1){
                   
            echo '<script type="text/javascript">';
            echo ' alert("Item Added Successfully"); window.location.href = "additem.php";';  //showing an alert box and redirect to additem.php
            echo '</script>';
        }else{
            // echo mysqli_error($conn);
            echo '<script type="text/javascript">';
            echo ' alert("Failed"); window.location.href = "additem.php";';  //showing an alert box and redirect to additem.php
            echo '</script>';
        }

    }else{
        header("Location:additem.php");
        exit();
    }

?>