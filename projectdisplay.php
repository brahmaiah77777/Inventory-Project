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
$separateQuery = "SELECT `projectlist` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['projectlist'] == 1){

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details Page</title>
    <link rel="stylesheet" href="task1.css">
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

input[type=date]{
    width: 193px;
}
select{
    font-size: 20px;
    width: 193px
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
    background-color: azure;
    
}
.table1 td{
    text-align:left;
}
th{
    padding:10px;
    background-color:#5f9ea0;
    color:#fff;
}
td{
    text-align:left;
}
    </style>
   
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
                    Project Details
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

   
  
<?php  
 
$projectErr = $projectidErr = $projectstatusErr = $fromdateErr = $todateErr = $daysErr  ="";  
$project = $projectid = $projectstatus = $fromdate = $todate = $days =  "";  
  
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
     
    if (empty($_POST["projectname"])) {  
         $projectErr = "Name is required";  
    } else {  
        $project = input_data($_POST["projectname"]);  
            
            if (!preg_match("/^[a-zA-Z ]*$/",$project)) {  
                $projectErr = "Only alphabets and white space are allowed";  
            }  
    }  
    if(empty($_POST["projectid"])){
        $projectidErr = "project id required";
    }
    else{
        $projectid = input_data($_POST["projectid"]);
    }
  
     
    
    if (empty ($_POST["fromdate"])) {  
            $fromdateErr = "date is required";  
    } else {  
            $fromdate = input_data($_POST["fromdate"]);  
    }  
  if(empty($_POST["todate"])){
    $todateErr = "date is required";
  }
  else{
    $todate = input_data($_POST["todate"]);
  }
    
  if(empty($_POST["totaldays"])){
    $daysErr = "days are required";
  }
  else{
    $days = input_data($_POST["totaldays"]);
  }
  $projectstatus = input_data($_POST["projectstatus"]);
}  

function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  

?>  
    <a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    position:relative;
    top:30px;">Back</a>



<br><br>
<?php

include "config.php";

$sql = "SELECT * FROM `project_details`";
$result = $conn->query($sql);

?>

<table border="2">
<br><br>    

<tr  class="form">
    
    <th>Project Name</th>
    <th>Project State</th>
    <th>Project From Date</th>
    <th>Project To Date</th>
    <th>Project Total Days</th> 
    <th>Edit</th>
    <th>Delete</th>
   
</tr>
<tbody  style ="text-align:center">

                <?php
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $Projectid = $row['Projectid'];
                        $Projectname = $row['Projectname'];
                        $Projectstate = $row['projectstate'];
                        $Projectfromdate = $row['Projectfromdate'];
                        $Projecttodate = $row['Projecttodate'];
                        $Totalduration = $row['Totalduration'];
           
            echo '<tr>
           
            <td>'.$Projectname.'</td>
            <td>'.$Projectstate.'</td>
            <td style="text-align:center;">'.$Projectfromdate.'</td>
            <td style="text-align:center;">'.$Projecttodate.'</td>
            <td style="text-align:center;">'.$Totalduration.'</td>
           
            <td>
            <button class="btn btn-primary"><a href="projectupdate.php? updateid='.$Projectid.' " class="text-light">Edit</a></button>
            </td>
            <td>
            <button class="btn btn-danger"><a href="projectdelete.php? deleteid='.$Projectid.' " class="text-light">Delete</a></button>
            </td>
            </tr>
            ';
                        
                        ?>  
                        <tr>
                            
                   
                            
                        </tr>
                        <?php
                    }
                }
                    ?>
                
                
            </tbody>
   
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