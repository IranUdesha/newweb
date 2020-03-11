<?php

$selectCategories = " SELECT DISTINCT `category` FROM `category`"; // get category for dropdown menu
$CategoriesResult = mysqli_query($conn,$selectCategories);

if(isset($_POST['search']))
{
    $scategory = $_POST['scategory'];
    $sstatus = $_POST['sstatus'];
    $saction = $_POST['saction'];
    $sfromDate = $_POST['sfromDate'];
    $stoDate = $_POST['stoDate'];


    if($stoDate == null and $sfromDate == null)
    {
        $selectItemData = " SELECT * FROM `item` WHERE  category LIKE '%$scategory%' AND status LIKE '$sstatus%' AND action LIKE '$saction%' ";
        $selectItemDataResult = mysqli_query($conn,$selectItemData);
        $CurrentRowCount = mysqli_num_rows($selectItemDataResult);

        $FullItem = "";
        $FilterDate = "";
    }
    else
    {
        if($stoDate == null or $sfromDate == null)
        {
            
            echo '<script type="text/javascript">';
            echo ' alert("Please fill both From Date and To Date"); window.location.href = "index.php";';  //showing an alert box and redirect to index.php
            echo '</script>';
        }
        else
        {
        $selectItemData = " SELECT * FROM `item` WHERE  category LIKE '%$scategory%' AND status LIKE '$sstatus%' AND action LIKE '$saction%' AND date BETWEEN '$sfromDate' AND '$stoDate' ";
        $selectItemDataResult = mysqli_query($conn,$selectItemData);
        $CurrentRowCount = mysqli_num_rows($selectItemDataResult);

        $FilterDate = "/ From : ".$sfromDate." To : ".$stoDate;
        $FullItem = "";
        }
    }
    
    

    if($scategory=="" AND $sstatus=="" AND $saction=="" AND $stoDate == null AND $sfromDate == null)
    {
        $FullItem = "Nothing, All items are displayed.";
        $FilterDate = "";
    }
}
else
{
    $selectItemData = " SELECT * FROM `item` ";
    $selectItemDataResult = mysqli_query($conn,$selectItemData);
    $CurrentRowCount = mysqli_num_rows($selectItemDataResult);
    $FullItem = "Nothing, All items are displayed.";
    $scategory = "";
    $sstatus = "";
    $saction = "";
    $FilterDate = "";
}



?>
