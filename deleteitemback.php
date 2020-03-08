<?php
    require 'asset/connection.php';

    $itemid = $_GET['itemid'];
    
    $deleteItem = " DELETE FROM `item` WHERE item_id = '$itemid' ";

    $deleteItemResult = mysqli_query($conn,$deleteItem);

    if($deleteItemResult)
    {
        echo '<script type="text/javascript">';
        echo ' alert("Item is Deleted "); window.location.href = "index.php";';  //showing an alert box.
        echo '</script>';
    }
    else
    {
        echo '<script type="text/javascript">';
        echo ' alert("Failed"); window.location.href = "index.php";';  //showing an alert box.
        echo '</script>';
    }






    
?>