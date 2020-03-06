<?php

include'asset/connection.php';
    if(isset($_POST['adduser'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = password_hash( $_POST['password'],PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $acctype = $_POST['accounttype'];

        // echo $fname." ".  $lname." \n". $username." \n". $password."\n ".$email."\n ". $acctype  ;

        $sql = "INSERT INTO login (fname,lname,username,password,email,user_type,date) VALUES('$fname',' $lname','$username','$password','$email','$acctype',CURRENT_TIMESTAMP)";

        $result = mysqli_query($conn,$sql);
        if($result == 1){
                   
            echo '<script type="text/javascript">';
            echo ' alert("Registration Successfull"); window.location.href = "adduser.html";';  // showing an alert box.
            echo '</script>';
        }else{
            
            echo '<script type="text/javascript">';
            echo ' alert("Registration Failed"); window.location.href = "adduser.html";';  //showing an alert box.
            echo '</script>';
        }

    }else{
        header("Location:adduser.html");
        exit();
    }


?>