
  
<?php
/*
 if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
//  $servername = "localhost";
//  $username = "root";
//  $password = "";
//  $databasename = "formdatabase";

// $conn = mysqli_connect($servername, $username, $password, $databasename);
  //$conn = new mysqli($servername, $username, $password, $databasename);

//   if($conn->connect_error){
//     die("connection failed ".$conn->connect_error);
//   }

$conn = mysqli_connect('localhost', 'root', '', 'formdatabase');

  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $firtname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO 'usertable' VALUES ('$id', '$firtname', '$lastname', '$email', '$password', '$gender')";
    $result = mysqli_query($conn,$sql);


    if($result == TRUE){
   // if($conn->query($sql) == TRUE){
        echo "data inserted into usertable successfully...";
    }
    else{
        echo "error occured...".$sql."<br>".$conn->error;
    }
  }
}
*/
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    
    $conn = mysqli_connect('localhost','root','','formdatabase') or die("connection failed".mysqli_connect_error());

    if(isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender'])){

        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO 'usertable' VALUES ('$id', '$firstname', '$lastname', '$email', '$password', '$gender')";

        $query = mysqli_query($conn,$sql);

        if($query){
            echo "data inserted successfully";
        }
        else{
            echo "error occured";
        }


    }
}

?>