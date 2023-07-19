    
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
    <title>Approval  page</title>
    
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="hover.css">

    <style>
        span > img{
            width:115px;
        }
        h4{
            text-transform:uppercase;
        }
        td{
            text-align:center;
        }
        .dropdown:hover .dropbtn {
            background-color: red;
    
        }
        h1{
            color:blueviolet;
        }
        
       
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
                    Approval page
                    </h2>
                    <h2 style="position:relative ; left:285px; font-size:13px;">
                    <?php
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

            

<?php
 include "config.php";
 $requestid = $_GET['approveid'];
 $sql = "SELECT * FROM `inventory_request_details` WHERE `requestid` = '$requestid'";
 $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_assoc($result);
  $requestid = $row['requestid'];
  $Projectdetails = $row['Projectdetails'];
 // $Projectid = $row['Projectid'];
  $Status = $row['Status'];
 // $Requestedemploy =$row['Requestedemploy'];
  $Requestedemployremarks = $row['Requestedemployremarks'];
  $Approval1remarks = $row['Approval1remarks'];
  $Approval2remarks = $row['Approval2remarks'];

  if(isset($_POST['update'])){
    
    $requestid = $_POST['requestid'];
    $Projectdetails = $_POST['Projectdetails'];
   // $Projectid = $_POST['Projectid'];
    $Status = $_POST['Status'];
 //   $Requestedemploy = $_POST['Requestedemploy'];
    $Requestedemployremarks = $_POST['Requestedemployremarks'];
    $Approval1remarks = $_POST['Approval1remarks'];
    $Approval2remarks = $_POST['Approval2remarks'];

    $sql = "UPDATE `inventory_request_details` SET `requestid`='$requestid',
                                                   `Projectdetails`='$Projectdetails',
                                                  
                                                   `Status`='$Status',
                                                   
                                                   `Requestedemployremarks`='$Requestedemployremarks',
                                                   `Approval1remarks`='$Approval1remarks',
                                                   `Approval2remarks`='$Approval2remarks'
                                                    WHERE `requestid`='$requestid' ";

    
  $result = mysqli_query($conn,$sql);
  if($result){
   ?>
   <script>
    alert("Data Approve");
    window.history.go(-2);
   </script>
   <?php
  }
  else{
    die(mysqli_error($conn));
  }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color:#ff0001;

        }
        h1{
            text-align:center;
            color:red;
        }
        .form{
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
        input[type="submit"]{
            position: relative;
            left:120px;
        }
    </style>
</head>
<body>
    <h1>Approval  Changes Form</h1>
    <center>
    <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>" method="post">
      <table>
        <tr>
            <td>Request Id : </td>
            <td>
                <input type="text" name="requestid" id="" value="<?php echo $requestid ; ?>">
            </td>
            <td>
                <span class="error">*</span>
            </td>
        </tr>
        <tr>
            <td>Project Name : </td>
            <td>
                <input type="text" name="Projectdetails" id="" value="<?php echo $Projectdetails ; ?>">
            </td>
            <td>
                <span class="error">*</span>
            </td>
         </tr>
        
        <tr>
            <td>Status : </td>
            <td>
                <input type="text" name="Status" id="" value="<?php echo $Status ; ?>">
            </td>
        </tr>
       
        <tr>
            <td>Requested Employ Remarks :</td>
            <td>
                <input type="text" name="Requestedemployremarks" id="" value="<?php echo $Requestedemployremarks ; ?>">
            </td>
        </tr>
        <tr>
            <td>Approval1 Remarks :</td>
            <td>
                <input type="text" name="Approval1remarks" id="" value="<?php echo $Approval1remarks ; ?>">
            </td>
        </tr>
        <tr>
            <td>Approval2 Remarks :</td>
            <td>
                <input type="text" name="Approval2remarks" id="" value="<?php echo $Approval2remarks ; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="7">
            <input type="submit" name="update" id="" value="Approve">
            </td>
        </tr>
      </table>

</form>
    </center>
</body>
</html>