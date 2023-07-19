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
$separateQuery = "SELECT `projectupdate` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['projectupdate']){

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Updation Page</title>
    
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
        .error {
    color: #FF0001;
    
}

h1{
    text-align:center;
    color:red;


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
.td{
    text-align:left;
}
select{
    font-size:17px;
    width:193px;
}
input[type=date]{
    width:193px;
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
                    Project Updation
                    </h2>
                    <h2 style="position:relative ; left:285px; font-size:13px;">
                    <?php
                        // Set the new timezone
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('y-m-d h:i:sa');
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
                        <label for="">Project Id</label>
                        <input type="text" name="projectid" id="">
                        <input type="submit" name="enter" id="" value="enter" style="border:2px solid green">
                    </form>
                    
               
 
<?php


  if(isset($_POST['update'])){
    $Projectid = $_POST['Projectid'];
    $Projectname = $_POST['Projectname'];
    $Projectstatus = $_POST['Projectstatus']; 
    $Projectfromdate = $_POST['Projectfromdate'];
    $Projecttodate = $_POST['Projecttodate'];
    $Totalduration = $_POST['Totalduration'];
    $projectstate = $_POST['statename'];
    $date = date("y-m-d h:i:s");

   
    $sql = "UPDATE `project_details` SET `Projectid` = '$Projectid',`Projectname` ='$Projectname', 
                                        `projectstate` = '$projectstate',`Projectstatus` ='$Projectstatus' ,
                                        `Projectfromdate` = '$Projectfromdate' ,`Projecttodate` = '$Projecttodate',`Totalduration` = '$Totalduration',
                                        `updatedby` = '$separateid',`updatedon` = '$date'
                                        WHERE  `Projectid` = '$Projectid' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:projectdetails.php');
    }
    else{
        die(mysqli_error($conn));
    }
?>
  <script>
        alert("project updated succssfully");
        window.history.go(-2);
    </script>
<?php
  }
?>



    <?php
    include "config.php";
    $Projectid = $Projectname = $Projectstatus = $Projectfromdate = $Projecttodate = $Totalduration  = "";

    if(isset($_POST['enter'])){
    $Projectid = $_POST['projectid'];
    $sql = "SELECT * FROM `project_details` WHERE `Projectid` = '$Projectid' ";
    $result = mysqli_query($conn,$sql);
  
    $row = mysqli_fetch_assoc($result);
    $Projectid = $row['Projectid'];
    $Projectname = $row['Projectname'];
    $Projectstatus = $row['Projectstatus'];
    $Projectfromdate = $row['Projectfromdate'];
    $Projecttodate = $row['Projecttodate'];
    $Totalduration = $row['Totalduration'];
    }   
    ?>
<h1> Project Updation</h1>
<center>
<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <table>
        <tr>
            <td class = "td">Project Id :</td>
            <td>
                <input type="text" name="Projectid" id="" value="<?php echo $Projectid ; ?>">
            </td>
            <td>
                <span class="error">* </span>
            </td>
        </tr>
        <tr>
            <td class = "td">Project Name :</td>
            <td>
                <input type="text" name="Projectname" id="" value="<?php echo $Projectname ; ?>">
            </td>
            <td>
                <span class="error">* </span>
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
            <td class = "td"> Project Status:   
            </td>
            <td>
                <select name="Projectstatus" id="" value="<?php echo $Projectstatus ;?>">
                    <option value="select">Select</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </td>
            
            <td>
                <span class="error">*</span>
            </td>
        </tr>
        <tr>
            <td class = "td">Project From Date : </td>
            <td>
                <input type="date" name="Projectfromdate" id="" value="<?php echo $Projectfromdate ; ?>">
            </td>
            <td>
                <span class="error">* </span>
            </td>
        </tr>
        
        <tr>
            <td class = "td">Project To Date : </td>
           <td>
            <input type="date" name="Projecttodate" id="" value="<?php echo $Projecttodate ; ?>">
           </td>
            <td>
                <span class="error">* </span>
            </td>
        </tr>
       
        <tr>
            <td class = "td">Total Duration : </td>
            <td>
                <input type="number" name="Totalduration" id="" value="<?php echo $Totalduration ; ?>">
            </td>
            <td>
                <span class="error">*</span>
            </td>
        </tr>
        
        <tr>
            <td colspan="5" >
                <center>
                <input type="submit" name="update" id="" value="Update">

                </center>
            </td>
            
        </tr>
<br><br>
</table>

</center>
</form>

  
</body>  
<a href="projectdisplay.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    top:50px;">Back</a>
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