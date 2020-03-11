<?php
session_start();   
    require 'asset/connection.php';

    if(isset($_POST['update'])){
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $npassword = $_POST['npassword'];
        $cpassword = $_POST['cpassword'];
        $email = $_POST['email'];
        $u_id = $_SESSION['u_id'];

        $sql = "SELECT * FROM login WHERE u_id='$u_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $hasspassowrd = $row['password'];  //fetch the password from database
        
        if(password_verify($password,$hasspassowrd)){
            if($npassword == $cpassword){
                $newpassword = password_hash($npassword, PASSWORD_DEFAULT); // encrypt the new Password
                $sql2 = "UPDATE login SET fname='$fname', lname='$lname', username='$username', password='$newpassword', email='$email', modified_date=CURRENT_TIMESTAMP WHERE u_id='$u_id' ";
                $result = mysqli_query($conn,$sql2);
        // echo mysqli_error($conn);
                     if($result == 1){                   
                            echo '<script type="text/javascript">';
                            echo ' alert("User Details Updated Successfully"); window.location.href = "editprofile.php";';  //showing an alert box and redirect to additem.php
                            echo '</script>';
                     }else{
            // echo mysqli_error($conn);
                            echo '<script type="text/javascript">';
                            echo ' alert("Update Failed...!"); window.location.href = "editprofile.php";';  //showing an alert box and redirect to additem.php
                            echo '</script>';
                    }


            }else{
                // Password doesn't match
                echo '<script type="text/javascript">';
                echo ' alert("Password not Match!"); window.location.href = "editprofile.php";';  //showing an alert box and redirect to additem.php
                echo '</script>';
            }
        }else{
           //The Current password You Entered is Incorrect...!
            echo '<script type="text/javascript">';
            echo ' alert("Current password You Entered is Incorrect...!"); window.location.href = "editprofile.php";';  //showing an alert box and redirect to additem.php
            echo '</script>';
        }



    }else{
        header("Location:editprofile.php");
        exit();
    }


?>