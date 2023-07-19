
<?php
session_start();
include "config.php";
$query = mysqli_query($conn,"SELECT * FROM `employcreation` WHERE `empid`='".$_SESSION['empid']."' AND `password` = '".$_SESSION['password']."'");
while($row = mysqli_fetch_row($query)){
     $id = $row[4];
     $name = $row[1];
     $separateid = $row[0];
}
?>

<?php
$separateQuery = "SELECT `employeecreation` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['employeecreation'] == 1){

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Creation page</title>
    <link rel="stylesheet" href="hover.css">

    <style>
        body{
            background-color:black;
        }
        span > img{
            width:115px;
        }
        .error {
            color: #FF0001;
    
}

h1{
    text-align:center;
    color:red;
}

td > a{
    border:2px solid black;
}
.form  {
    padding: 0;
    margin: 0;
    font-family: 'Rajdhani', sans-serif;
    box-sizing: border-box;
    outline: none;
    user-select: none;
    list-style-type: none;
    text-decoration: none;
    transition: all 400ms;
    overflow-x: hidden;
    background-color: aliceblue;
    
}
select{
    width:193px;
}
input[type=radio]{
    margin:10px;
}


    </style>
    <link rel="stylesheet" href="task1.css">
</head>
<input type="checkbox" id="nav-toggle">
    
    <div class="sidebar">
            <div class="sidebar-brand">
               
                <span id="kleenpulse"><img src="esoft.jpg" alt=""></span>
            </h2>
            </div>
            <div class="sidebar-menu">
            <ul>
                    
                     
                    <li>
                        <?php
                        $separatePageQuery = "SELECT * FROM `rolemasterinfo` WHERE `roleid` = '$id' ";
                        $separatePageResult = mysqli_query($conn,$separatePageQuery);
                        while($separatePageRow = mysqli_fetch_assoc($separatePageResult)){
                            ?>
                            <div>
                                <a href="task1.php">Dashboard</a>
                            </div>

                            <?php
                            if($separatePageRow['employeecreation'] == 1){
                                ?>
                                 <div class="dropdown">
                                                <button class="dropbtn" style="position:relative;">user details</button>
                                                <div class="dropdown-content">
                                                    <a href="empcreationdisplay.php">User List</a>
                                                    <a href="empcreation.php">User Creation</a>
                                                    <a href="update.php">User Update</a>
                                                </div>
                                                </div>
                                                
                                <?php
                            }
                            if($separatePageRow['roles'] == 1){
                                ?>
                                 <div>
                                                <a href="rolespage.php" >Roles</a>
                                                </div>
                                <?php
                            }
                            if($separatePageRow['inventorycreation'] == 1){
                                ?>
                                <div class="dropdown">
                                                <button class="dropbtn">Inventory</button>
                                                <div class="dropdown-content">
                                                    <a href="newinventory.php">Inventory List</a>
                                                    <a href="newitems.php">Inventory Creation</a>
                                                    
                                                </div>
                                                </div>
                                <?php
                            }
                            if($separatePageRow['projectcreation'] == 1){
                                ?>
                                  <div class="dropdown">
                                                <button class="dropbtn" style="position:relative;right:36px;">Project Details</button>
                                                <div class="dropdown-content">
                                                    <a href="projectdisplay.php">Project List</a>
                                                    <a href="projectdetails.php">Project Creation</a>
                                                    <a href="projectupdate.php">Project Update</a>
                                                </div>
                                                </div>
                                <?php
                            }
                            if($separatePageRow['requestcreation'] == 1){
                                ?>
                                  <div class="dropdown">
                                                <button class="dropbtn">Requests</button>
                                                <div class="dropdown-content">
                                                    <a href="request.php">Request List</a>
                                                    <a href="addnewrequest.php">Request Creation</a>
                                                    
                                                </div>
                                                </div>
                                <?php
                            }
                            if($separatePageRow['approvalrejectedstatus'] == 1){
                                ?>
                                <div>
                                                <a href="status.php">Approval Rejected Status</a>
                                                </div>
                                <?php
                            }
                            if($separatePageRow['inventorydispatch'] == 1){
                                ?>
                                 <div>
                                                <a href="dropdown2.php">Inventory Dispatch</a>
                                                </div>
                                <?php
                            }
                            if($separatePageRow['inventorytracking'] == 1){
                                ?>
                                <div>
                                    <a href="dispatch.php">Inventory tracking</a>
                                </div>
                                <?php
                            }
                            if($separatePageRow['report'] == 1){
                             ?>
                              <div>
                                               <a href="report.php">Reports</a>
                                               </div>
                                                
                             <?php   
                            }
                        }
                        ?>
                    </li>
                    
                </ul>
            </div>
    </div>
    <div class="main-wrapper">
    <div class="main-content">
            <header>
                <h2 class="heading" id="dashboard">
                    User Creation
                    </h2>

                <div class="user-wrapper">
                    <img src="https://assets.codepen.io/3853433/internal/avatars/users/default.png?format=auto&version=1617122449&width=40&height=40"
                        alt="">
                    <div>
                       
                        <h4><?php echo $name ; ?> </h4>
                        <h3><a href="index.php">Logout</a></h3>
                    </div>
                </div>
            </header>
           
             <main style="margin-top:0px;">
                
                

 
<body>    
<?php
function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
  } 
$empnameErr = $emailErr = $mobilenoErr = $genderErr  = $passwordErr=$empidErr="";  
$empname = $email = $mobileno = $gender = $role = $password=$empid= "";  
  
  
if (isset($_POST['add'])) {  
    $role = input_data($_POST["role"]);
  
    if (empty($_POST["empname"])) {  
         $empnameErr = "Name is required";  
    } else {  
        $empname = input_data($_POST["empname"]);  
            
            if (!preg_match("/^[a-zA-Z ]*$/",$empname)) {  
                $empnameErr = "Only alphabets and white space are allowed";  
            }  
    }  
  
         
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
       
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
     
    if (empty($_POST["mobileno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobileno"]);  
             
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  
      
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }  
      
    
    if (empty ($_POST["gender"])) {  
            $genderErr = "Gender is required";  
    } else {  
            $gender = input_data($_POST["gender"]);  
    }  
  if(empty($_POST['empid'])){
    $empidErr = "empid is required";
  }
  else{
    $empid = input_data($_POST["empid"]);
  
    if(!preg_match("/^[a-zA-Z0-9]*$/",$empid)){
    $empidErr = "only alphabets and digits required";
   }
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

 
?>
    


<a href="empcreationdisplay.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    position:relative;
    top:10px;">Back</a>
<center>
<form class="form" method="POST" action="" >
    <table>
        <tr>
            <td>User Id :</td>
            <td>
                <input type="text" name="empid" id="">
            </td>
            <td>
                <span class="error">* <?php echo $empidErr ; ?></span>
            </td>
        </tr>
        <tr>
            <td>User Name :</td>
            <td>
                <input type="text" name="empname" id=""  >
            </td>
            <td>
                <span class="error">*  <?php echo $empnameErr ; ?> </span>
            </td>
        </tr>
        <tr>
            <td>    Mobile No:   
            </td>
            <td>
                <input type="text" name="mobileno" id="" >
            </td>
            <td>
                <span class="error">* <?php  echo $mobilenoErr ; ?> </span>
            </td>
        </tr>
        <tr>
            <td>Email : </td>
            <td>
                <input type="email" name="email" id="">
            </td>
            <td>
                <span class="error">* <?php echo $emailErr ; ?> </span>
            </td>
        </tr>
        
        <tr>
            <td>Role : </td>
           <td>
            <select name="role" id="">
                <option value="">Select</option>
                <?php
                        include "config.php";
                        $sql = "SELECT * FROM `rolemasterinfo` ";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            
                    while ($role = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $role["roleid"];
                        
                        ?>">
                    <?php echo $role["rolename"];
                   
                            ?>
                        </option>
                            <?php
                            
                        }}
                  
                        ?>
            </select>
           </td>
            <td>
                <span class="error"> </span>
            </td>
        </tr>
        <tr>
            <td>Gender : </td>
            <td>
                <input type="radio" name="gender" id="" value="male">Male
                <input type="radio" name="gender" id="" value="female">Female
            </td>
            <td>
                <span class="error">* <?php echo $genderErr ;  ?> </span>
            </td>
        </tr>
        <tr>
            <td>Password : </td>
            <td>
                <input type="password" name="password" id="" >
            </td>
            <td>
                <span class="error">* <?php echo $passwordErr ;?></span>
            </td>
        </tr>
        
        <tr>
            <td colspan="4" >
                <input type="submit" name="add" id="" value="ADD">
            </td>
            
            
        </tr>
<br><br>

</table>

</center>
</form>

<?php

  include "config.php";
  
  if(isset($_POST['add']))
  {
    
    if($empidErr == "" && $empnameErr == "" && $mobilenoErr == "" && $emailErr == "" && $genderErr == "" )
    {
    $empid = $_POST['empid'];
    $empname = $_POST['empname'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $date = date("d-m-y h:i:s");
    
  
        $sql1 = "INSERT INTO `employcreation` (`empid`,`empname`,`mobileno`,`email`,`role`,`gender`,`password`,`createdby`,`createdon`) VALUES ('$empid','$empname','$mobileno','$email','$role','$gender','$password','$separateid','$date')";
        $result1 = mysqli_query($conn,$sql1);
        if($result1)
        {

        ?>
        <script language="javascript">
            alert("Record Inserted Succefully");
        </script>
        <?php
        }
    }
}
  
?>
  
        
</table>

</center>
</form>

</body>  
     
</main> 

</html>

<?php
    }
    else{
        ?>
        <script>
            alert("No Access For This User");
            window.history.go(-1);
        </script>
        <?php
    }
}
?>