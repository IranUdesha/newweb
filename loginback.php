<?php   
session_start();

    if(isset($_POST['login'])){
        require 'asset/connection.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

       if(empty($username)|| empty($password)){
            
            header("Location:login.php");
            exit();
        }else{
            $sql = "SELECT * FROM login where username ='$username' ";

           $result = mysqli_query($conn,$sql);

           if($row = mysqli_fetch_array($result)){
               $hashedpass =  password_verify($password, $row['password']);
              
               if($hashedpass == false){
                     header("Location:login.php");

               }elseif($hashedpass == true){
                    $_SESSION['username'] = $username;
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    $_SESSION['password'] = $password;
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_type'] = $row['user_type'];
                    $_SESSION['u_id']=$row['u_id'];
                    
                  header("Location:index.php ");
                    
               }
           }
            
           
        }


    }else{
        header("Location:login.php");
        exit();
    }

?>