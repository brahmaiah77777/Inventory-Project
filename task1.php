    
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
    <title>Dasboard page</title>
    
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
            text-align:left;
            padding:13px;
            color:black;
            
        }
        th{
            padding:13px;
            background-color:cadetblue;
            color:white;
        }
        .dropdown:hover .dropbtn {
            background-color: red;
    
        }
        h1{
            color:black;
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
                    Dashboard
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

                <center>
                    <h1>Project Details</h1>
                    <?php
                            $sql = "SELECT * FROM `project_details`";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_affected_rows($conn) == 0){
                                echo "No Data found";
                            }
                            else{
                                ?>
                    <table border="2">
                        <thead  style="border:2px solid ;">
                            <th>Project Name</th>
                            <th>Project Id</th>
                            <th>Project From Date</th>
                            <th>Project To Date</th>
                            <th>Project Status</th>
                        </thead>
                        <tbody>
                          <?php
                            while($row = mysqli_fetch_assoc($result)){
                                $projectname = $row['Projectname'];
                                $projectid = $row['Projectid'];
                                $projectfromdate = $row['Projectfromdate'];
                                $projecttodate = $row['Projecttodate'];
                                $projectstatus = $row['Projectstatus'];
                                ?>
                                <tr>
                                    <td><?php echo $projectname?></td>
                                    <td><?php echo $projectid?></td>
                                    <td style="text-align:center;"><?php echo $projectfromdate?></td>
                                    <td style="text-align:center;"><?php echo $projecttodate?></td>
                                    <td><?php echo $projectstatus?></td>
                                </tr>
                                <?php
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <h1>Dispatch Details</h1>
                    <?php
                            $sql = "SELECT * FROM `tracking_details`";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_affected_rows($conn) == 0){
                                echo "No Data Found";
                            }
                            else{
                            ?>
                    <table border="2">
                        <thead  style="border:2px solid ;">
                            <th>Item Code</th>
                            <th>Sub Item Id</th>
                            <th>Barcode Id</th>
                            
                           
                            <th>Project Id</th>
                        </thead>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_assoc($result)){
                                $itemcode = $row['itemcode'];
                                $subitemid = $row['subitemid'];
                                $barcodeid = $row['barcodeid'];
                                $projectid = $row['projectid'];
                               
                                ?>
                                <tr>
                                    <td><?php echo $itemcode ; ?> </td>
                                    <td><?php echo $subitemid ;?></td>
                                    <td><?php echo $barcodeid ; ?> </td>
                                   
                                    <td><?php echo $projectid ;?></td>
                                </tr>
                                <?php
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <h1>Inventory Request Details</h1>
                    <?php
                            $sql = "SELECT * FROM `inventory_request_details`";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_affected_rows($conn) == 0){
                                echo "No Data Found";
                            }
                            else{
                            ?>
                    <table border="2">
                        <thead >
                            <th>Request Id</th>
                            <th>Project Name</th>
                            <th>Project Id</th>
                            <th>Requested User Id</th>
                            
                        </thead>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_assoc($result)){
                                $requestid = $row['requestid'];
                                $projectname = $row['Projectdetails'];
                                $projectid = $row['Projectid'];
                                $requestedempid = $row['Requestedempid'];
                                
                                ?>
                                <tr>
                                    <td><?php echo $requestid ; ?> </td>
                                    <td><?php echo $projectname ; ?></td>
                                    <td><?php echo $projectid ; ?></td>
                                    <td style = "text-align:center;"><?php echo $requestedempid ; ?></td>
                
                                </tr>
                                <?php
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </center>

                </div> 
               
</main> 

</body>
</html>
