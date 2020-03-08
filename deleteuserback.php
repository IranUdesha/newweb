<?php
    require 'asset/connection.php';

    $uid = $_GET['uid'];
    
    $deleteItem = " DELETE FROM `login` WHERE u_id = '$uid' ";

    $deleteItemResult = mysqli_query($conn,$deleteItem);

    if($deleteItemResult)
    {
        echo '<script type="text/javascript">';
        echo ' alert("User account is Deleted"); window.location.href = "deleteusers.php";';  //showing an alert box.
        echo '</script>';
    }
    else
    {
        echo '<script type="text/javascript">';
        echo ' alert("Failed"); window.location.href = "deleteusers.php";';  //showing an alert box.
        echo '</script>';
    }






    
?>