<?php
    session_start();   
    include'asset/connection.php';
    if(isset($_POST['adduser'])){
        //get input from front end
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = password_hash( $_POST['password'],PASSWORD_DEFAULT); //password convet to hash code
        $email = $_POST['email'];
        $acctype = $_POST['accounttype'];
        
        $sql = "INSERT INTO login (fname,lname,username,password,email,user_type,date) VALUES('$fname',' $lname','$username','$password','$email','$acctype',CURRENT_TIMESTAMP)";

        $result = mysqli_query($conn,$sql);
        if($result == 1){
                   
            echo '<script type="text/javascript">';
            echo ' alert("Registration Successfull"); window.location.href = "adduser.php";';  // showing an alert box.
            echo '</script>';
        }else{
            
            echo '<script type="text/javascript">';
            echo ' alert("Registration Failed"); window.location.href = "adduser.php";';  //showing an alert box.
            echo '</script>';
        }

    }else{
        header("Location:adduser.php");
        exit();
    }


?>