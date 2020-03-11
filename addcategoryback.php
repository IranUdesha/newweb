<?php
session_start();   
include'asset/connection.php';
    // add Category part
    if(isset($_POST['addcat'])){

       $ncategory = $_POST['newcategory'];      
                    
       $sql = "INSERT INTO category (category) VALUES('$ncategory')";
    
        $result = mysqli_query($conn,$sql);
        
        if($result == 1){
                   
            echo '<script type="text/javascript">';
            echo ' alert("Category is Added Successfully"); window.location.href = "addcategory.php";';  //showing an alert box.
            echo '</script>';
        }else{
            echo mysqli_error($conn);
            echo '<script type="text/javascript">';
            echo ' alert("Failed"); window.location.href = "addcategory.php";';  //showing an alert box.
            echo '</script>';
            
        }
    }elseif(isset($_POST['addunit'])){

            $nunits = $_POST['newunits'];

            $sql2 = "INSERT INTO units (unit) VALUES('$nunits')";
            $result2 = mysqli_query($conn,$sql2);

            if($result2 == 1){
                   
                echo '<script type="text/javascript">';
                echo ' alert(" Unit is Added Successfully"); window.location.href = "addcategory.php";';  //showing an alert box.
                echo '</script>';
            }else{
                echo mysqli_error($conn);
                echo '<script type="text/javascript">';
                echo ' alert("Failed"); window.location.href = "addcategory.php";';  //showing an alert box.
                echo '</script>';
                
            }

    }elseif(isset($_POST['removecat'])){
        $rcategory = $_POST['rcategory'];
        
        // DELETE FROM `category` WHERE `category`.`category` = ' 1w1w'
        $sql3 = "DELETE FROM category WHERE category = '$rcategory' ";
        // $sql3 = "DELETE FROM `category` WHERE category = '$rcategory' ";
        $result3 = mysqli_query($conn,$sql3);
        
    if($result3 == 1){               
        echo '<script type="text/javascript">';
        echo ' alert("Category is Deleted"); window.location.href = "addcategory.php";';  //showing an alert box.
        echo '</script>';
    }else{
        // echo mysqli_error($conn);
        echo '<script type="text/javascript">';
        echo ' alert("Failed"); window.location.href = "addcategory.php";';  //showing an alert box.
        echo '</script>';
    }

    }elseif(isset($_POST['removeunit'])){

        $runits = $_POST['runit'];
        $sql4 = "DELETE FROM units WHERE unit = '$runits'";
        $result4 = mysqli_query($conn,$sql4);
        
        if($result4 == 1){               
            echo '<script type="text/javascript">';
            echo ' alert("Unit is Deleted"); window.location.href = "addcategory.php";';  //showing an alert box.
            echo '</script>';
        }else{
            echo mysqli_error($conn);
            echo '<script type="text/javascript">';
            echo ' alert("Failed"); window.location.href = "addcategory.php";';  //showing an alert box.
            echo '</script>';
        }
    
    
    }else{
         header("Location:addcategory.php");
         exit();
    }

?>