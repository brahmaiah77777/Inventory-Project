<?php


  //if(isset($_POST['submit'])){

    echo "data submitted successfully...";
    echo "<br>";
    echo "your details are <br>";
    echo "ID : ".$_POST['id'];
    echo "<br>";
    echo "First Name : ".$_POST['firstname'];
    echo "<br>";
    echo "Last name : ".$_POST['lastname'];
    echo "<br>";
    echo "Email : ".$_POST['email'];
    echo "<br>";
    echo "Password : ".$_POST['password'];
    echo "<br>";
    echo "Gender : ".$_POST['gender'];
    echo "<br>";
    echo "Thanks for submitting the data...";

 // }
  else if(isset($_POST['delete'])){
    echo "data deleted successfully...";
  }
?>