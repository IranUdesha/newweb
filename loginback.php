<?php   
session_start();
    if(isset($_POST['login'])){
        require 'asset/connection.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        // $pass = password_hash($password,PASSWORD_DEFAULT);
        // echo $pass;

        // $sql1  = "INSERT INTO login (username,password) VALUES('$username','$pass') ";
        // $result = mysqli_query($conn,$sql1);
        // if($result == 1){
        //     echo "success";
        // }else{
        //     echo "failed";
        // }

        if(empty($username)|| empty($password)){
            header("Location:login.php");
            exit();
        }else{
            $sql = "SELECT * FROM login where username = '".$username."' ";

           $result = mysqli_query($conn,$sql);

           if($row = mysqli_fetch_array($result)){
               $hashedpass =  password_verify($password, $row['password']);
                // echo $hashedpass;
               if($hashedpass == false){
                     header("Location:login.php");

               }elseif($hashedpass == true){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_type'] = $row['user_type'];

                    header("Location:index.php ");
                    
               }
           }
            
           
        }


    }else{
        // header("Location:");
        exit();
    }

?>