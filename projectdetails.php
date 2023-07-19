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
$separateQuery = "SELECT `projectcreation` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['projectcreation'] == 1){

    

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
  
function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
  } 
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

 

?>  
    <a href="projectdisplay.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    position:relative;
    top:30px;">Back</a>

<h1>Create Project</h1>
<center>
<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <table class="table1">
        <tr>
            <td>Project Id : </td>
            <td>
                <input type="text" name="projectid" id="">
            </td>
            <td>
                <span class="error">*<?php echo $projectidErr ; ?> </span>
            </td>
        </tr>
        <tr>
            <td>Project Name :</td>
            <td>
                <input type="text" name="projectname" id="">
            </td>
            <td>
                <span class="error">*<?php echo $projectErr; ?> </span>
            </td>
        </tr>
        <tr>
            <td>Project State :</td>
            <td>
            <select name="statename" id="" required>
                <option value="">Select</option>
                <?php
                        include "config.php";
                        $sql = "SELECT * FROM `statedetails` ";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            
                    while ($state = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $state["Statename"];
                        
                        ?>">
                    <?php echo $state["Statename"];
                   
                            ?>
                        </option>
                            <?php
                            
                        }}
                  
                        ?>
            </select>
            </td>
            <td>
                <span class="error">* </span>
            </td>
        </tr>
        <tr>
            <td>Project Status</td>
            <td>
                <select name="projectstatus" id="">
                    <option value="select">Select</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>

                </select>

            </td>
            <td>
                <span class="error">*<?php echo $projectstatusErr ; ?> </span>
            </td>
        </tr>
        <tr>
            <td>  Project From Date   :   
            </td>
            <td>
                <input type="date" name="fromdate" id="">
            </td>
            <td>
                <span class="error">*<?php echo $fromdateErr; ?> </span>
            </td>
        </tr>
        <tr>
            <td>Project To Date :</td>
            <td>
                <input type="date" name="todate" id="">
            </td>
            <td>
                <span class="error">*<?php echo $todateErr; ?> </span>
            </td>
        </tr>
       
        <tr>
            <td>Total Days :</td>
            <td>
                <input type="number" name="totaldays" id="">
            </td>
            <td>
                <span class="error">*<?php echo $daysErr; ?> </span>
            </td>
        </tr>
        <tr>
            <td>Purpose Of The Project :</td>
           
            <td>
                <textarea name="" id="" cols="25" rows="4"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan = "3">
                <input type="submit" name="add" id="" value="ADD">
            </td>
            
            <td>
                <input type="submit" name="cancle" id="" value="CANCLE">
            </td>
        </tr>

  
</body>  
 
</main> 

</html>
<?php  

    if(isset($_POST['add'])) {  

    if($projectErr == "" && $projectidErr==""  && $projectstatusErr==""  && $fromdateErr == "" && $todateErr == "" && $daysErr == ""  ) {

       

        $conn = mysqli_connect("localhost","root","","register");

        $projectid = $_POST['projectid'];

        $project = $_POST['projectname'];

        $projectstate = $_POST['statename'];

        $projectstatus = $_POST['projectstatus'];

        $fromdate = $_POST['fromdate'];

        $todate = $_POST['todate'];

        $days = $_POST['totaldays'];

        $date = date("d-m-y h:i:s");




       

        $sql = "INSERT INTO `project_details`(`Projectid`, `Projectname`, `projectstate`,`Projectstatus`, `Projectfromdate`, `Projecttodate`, `Totalduration`,`createdby`,`createdon`) VALUES ('$projectid','$project','$projectstate','$projectstatus','$fromdate','$todate','$days','$separateid','$date')";

       

        $query = mysqli_query($conn,$sql);

        if($query){

            ?>

            <script language="javascript">

                alert("You have sucessfully create a project.");

            </script>

       <?php

        }

        else{

            ?>

            <script language="javascript">

                alert("Something went wrong .");

            </script>

            <?php

        }

    }




    }

 


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