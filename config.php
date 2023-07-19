<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $databasename = "register";

 $conn = mysqli_connect($servername, $username, $password, $databasename) ;
 if($conn->connect_error){
    die("connection failed ".$conn->connect_error);
 }
 
?>

