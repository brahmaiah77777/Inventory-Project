
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
    .login-page{
        width: 350px;
        margin: 5% 40% 6% auto;
        padding: 0 20px;
        background-color: #f9f9f9;
        border: 1px solid #f2f2f2;
    }
    .login-page .text-center{
        margin-bottom: 10px;
    }
    
    body{
        background-image:url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbSF4hd_JvtVXl0CBN2Cyt_iBosrgptSArgw&usqp=CAU");
        background-repeat:repeat;
        background-size:100%; 
    }

    .form-control{
        color: #646464;
        border: 1px solid #e6e6e6;
        border-radius: 3px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        -moz-transition: all .15s ease-out;
        -webkit-transition: all .15s ease-out;
        transition: all .15s ease-out;
    }
    .form-control:focus{
        background: #f8f8f8;
        border-color: #3498DB;
        outline: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
    h1{
    font-size:30px;
    }
    h4{
    font-size:15px;
    }
    label{
    position: relative;
    right: 117px;
    }
    .login-page{
    position: relative;
    bottom: -100px;
    left:80px;
    }
    </style>
</head>
<body>
    <?php
    $empidErr = $passwordErr = "";
    $empid = $password = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $empid = input_data($_POST['empid']);
        if(!preg_match("/^[0-9*$]/",$empid)){
            $empidErr = "only numeric values are allowed";
        }
        $password = input_data($_POST["password"]);

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $passwordErr= '8 characters at least 1 uppercase letter,number,special character.';
        }else{
            $password= input_data($_POST["password"]);
        }
    }
    function input_data($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
      }
    ?>
<center>

<div class="login-page">
    <div class="text-center">
       <h1>Login Panel</h1>
       <h4>Inventory Management System</h4>
     </div>
    
      <form method="post" action="" class="clearfix">
        <div class="form-group">
              <label for="empid" class="control-label" name="empid"><b>Emp id</b></label>
              <input type="text" class="form-control" name="empid" placeholder="Enter empid" required>
              <span><?php echo $empidErr ; ?></span>
        </div>
        <div class="form-group">
            <label for="Password" class="control-label" name="password"><b>Password</b></label>
            <input type="password" name= "password" class="form-control" placeholder="Enter Password" required> 
            <span><?php echo $passwordErr ; ?></span>
        </div>
        <div class="form-group">
                <button type="submit" name="submit" class="btn btn-danger" style="border-radius:0%; position:relative; right:20px;">Login</button>
        </div>
    </form>
</div>
</center>

</body>
</html>


<?php

include "config.php";
session_start();
if(isset($_POST['submit'])){
    $empid = $_POST['empid'];
    $password = $_POST['password'];

    $_SESSION['empid'] = $_POST['empid'];
    $_SESSION['password'] = $_POST['password'];
    $sql = "SELECT * FROM `employcreation` ";
    $result = mysqli_query($conn,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            if($row['empid'] == $empid && $row['password'] == $password){
                header("location:task1.php");
                break;
            }
            else{
                continue;
                echo "empid or password wrong";
                break;
            }
        }
    }

}
?> 


