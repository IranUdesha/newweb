<?php  

$servername = "localhost";
$username = "root";
$password = "";

$dbname = "custom_sr";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error()());
}

?>