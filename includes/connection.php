<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "FINAL2";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry : ".mysqli_connect_error());
}


?>