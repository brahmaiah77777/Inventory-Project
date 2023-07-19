

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
    <title>Items Page</title>
    
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="escstyle.css">
    <link rel="stylesheet" href="hover.css">
    
    <style>
        span > img{
            width:115px;
        }
        h4{
            text-transform:uppercase;
        }
        th{
            background-color:#5f9ea0;
            color:#fff;
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
                    Items List
                    </h2>
                    <h2 style="position:relative ; left:280px; font-size:13px;">
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
      
<body>
    


<?php
include "config.php";
$Itemcode = $_GET['itemcode'];

$itemQuery = "SELECT * FROM `inventory_itemvise_details` WHERE `Itemcode` = '$Itemcode'";
$itemResult = mysqli_query($conn,$itemQuery);
if(mysqli_affected_rows($conn) ==0){ 
    ?>
    <script>
        alert("NO Record Found");
        window.history.go(-1);
    </script>
    <?php
}
else{

?>
<center>
    <a href="newitems.php">ADD</a>
    </center>
    <table>
    <thead>
        <tr style="background-color:#5f9ea0; color:#fff;">
            <th style="background-color:#5f9ea0; color:#fff;">Item Code</th>
            <th style="background-color:#5f9ea0; color:#fff;">Sub Item Id</th>
            <th style="background-color:#5f9ea0; color:#fff;">Sub Item Name</th>
            <th style="background-color:#5f9ea0; color:#fff;">Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
while($itemdata = mysqli_fetch_assoc($itemResult)){
    $Itemcode = $itemdata['Itemcode'];
    $itemcodeid = $itemdata['subitemid'];
    $Itemname = $itemdata['subitemname'];
    echo '<tr>
    <td>'.$Itemcode.'</td>
    <td>'.$itemcodeid.'</td>
    <td>'.$Itemname.'</td>
    <td>
<button class="btn btn-primary" ><a href="updatecode.php? updatecode='.$itemcodeid.' " class="text-light">E d i t</a></button>
<button class="btn btn-danger"><a href="deletecode.php? deletecode='.$itemcodeid.' " class="text-light">Delete</a></button>
</td>
    </tr>
    ';       
}


?>
 </tbody>
    </table>
    <a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    position:relative;
    bottom:5px;">Back</a>
</main> 

</body>
</html>
<?php
}
?>


