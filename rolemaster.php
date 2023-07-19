
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employ Updation Page</title>
    
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="hover.css">

    <style>
        span > img{
            width:115px;
        }
        h4{
            text-transform:uppercase;
        }
        .hide{
            display:none;
        }
        .mydiv:hover + .hide{
            display:block;
            color:red;
        }
        /* a:hover{
            color: red;
      box-shadow: 0 5px 15px #afe0f5;

        } */
    </style>
    
</head>
<body>
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
    <div class="main-content" style="background:white;">
            <header>
                
                <h2 class="heading" id="dashboard">
                    Employ Updation
                    </h2>
                    <h2 style="position:relative ; left:285px; font-size:13px;">
                    <?php
                        // Set the new timezone
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('y-d-m h:i:sa');
                        echo $date;
                    ?>
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
                <div class="ermimage">
                    <form action="" method="POST">
                        <label for="">Emp Id</label>
                        <input type="text" name="empid" id="">
                        <input type="submit" name="enter" id="" value="enter" style="border:2px solid green">
                    </form>
                    <a href="empcreationdisplay.php" style= "font-size: 25px;
                                                             border: 2px solid red;
                                                             border-radius: 10px;
                                                             padding: 3px;
                                                             left: 700px;
                                                             bottom: 9px;
                                                             position: relative;">User List</a>
               
<?php

if(isset($_POST['update'])){
  $empid = $_POST['empid'];
  $empname = $_POST['empname'];
  $mobileno = $_POST['mobileno']; 
  $email = $_POST['email'];
  $role = $_POST['role'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  $date = date("d-m-y h:i:s");
  

  $sql = "UPDATE `employcreation` SET `empid` = '$empid',`empname` ='$empname', `mobileno` ='$mobileno' ,
                                      `email` = '$email' ,`role` = '$role',`gender` = '$gender',`password` ='$password',`updatedby` ='$name',`updatedon` = '$date'
                                      WHERE  `empid` = '$empid' ";
  $result = mysqli_query($conn,$sql);
  if($result){
    //   header('location:display.php');
    ?>
    <script>
        alert("data updated successfully");
    </script>
    <?php
  }
  else{
      die(mysqli_error($conn));
  }
}

?>


<head>  
  <title>Employ Updation Page</title>
<style>  
.error {
  color: #FF0001;
  
}

h1{
  text-align:center;
  color:red;


}
select{
  width:193px;
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
  
}

</style>  
</head>  
<body>    
<?php
$empid = $empname = $mobileno = $email = $role = $gender = $password = "";
if(isset($_POST['enter'])){
    $empid = $_POST['empid'];

include "config.php";
$sql = "SELECT * FROM `employcreation` WHERE `empid` = '$empid' ";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
$empid = $row['empid'];
$empname = $row['empname'];
$mobileno = $row['mobileno'];
$email = $row['email'];
$role = $row['role'];
$gender = $row['gender'];
$password = $row['password'];
}
?>

  
<h1>Employ Updation</h1>
<center>
<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
  <table>
      <tr>
          <td>Emp Id :</td>
          <td>
              <input type="text" name="empid" id="" value="<?php echo $empid ;?> ">
          </td>
          <td>
              <span class="error">* </span>
          </td>
      </tr>
      <tr>
          <td>Emp Name :</td>
          <td>
              <input type="text" name="empname" id=""value="<?php echo $empname ;?> " >
          </td>
          <td>
              <span class="error">* </span>
          </td>
      </tr>
      <tr>
          <td>    Mobile No:   
          </td>
          <td>
              <input type="text" name="mobileno" id="" value="<?php echo $mobileno ;?>">
          </td>
          <td>
              <span class="error">*</span>
          </td>
      </tr>
      <tr>
          <td>Email : </td>
          <td>
              <input type="email" name="email" id="" value="<?php echo $email ; ?>" >
          </td>
          <td>
              <span class="error">* </span>
          </td>
      </tr>
      
      <tr>
          <td>Role : </td>
         <td>
          <select name="role" id="" value="<?php echo $role ; ?> ">
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
              <input type="radio" name="gender" id="" value="male" >Male
              <input type="radio" name="gender" id="" value="female" >Female
          </td>
          <td>
              <span class="error">* </span>
          </td>
      </tr>
      <tr>
          <td>Password : </td>
          <td>
              <input type="password" name="password" id=""  >
          </td>
          <td>
              <span class="error">*</span>
          </td>
      </tr>
      <tr>
          <td>Comments : </td>
          <td>
              <textarea name="" id="" cols="25" rows="5"></textarea>
          </td>
      </tr>
      <tr>
          <td colspan="4" >
              <input type="submit" name="update" id="" value="Update">
          </td>
          
      </tr>
<br><br>
</table>

</center>
</form>

                </div> 
                <a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    top:50px;">Back</a>     
</main> 

</body>
</html>
                    