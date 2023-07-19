    
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
$separateQuery = "SELECT `inventorytracking` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['inventorytracking'] == 1){

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch page</title>
    
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="inventory.css">
    <link rel="stylesheet" href="hover.css">
    
    <style>
       
        select{
            font-size:20px;
            width:177px;
        }
        table{
            margin-bottom:20px;
        }
         span > img{
            width:115px;
        }
        .td{
            text-align:left;
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
                    Tracking
                    </h2>
                    <h2 style="position:relative ; left:285px; font-size:13px;">
                    <?php
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('y-m-d h:i:s');
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"  method= "POST">

                <?php
                $trackingId = $_GET['trackingid'];

                ?>
                <table>
                    <thead>
                        <th>Tracking Id</th>
                        <th>Tracking Status</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="trackid" id="" value = "<?php echo $trackingId ;?>" style="border:none;">
                            </td>
                            <td>
                                <input type="text" name="trackingstatus" id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan = "3">
                                <input type="submit" name="track" id="" >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php
            if(isset($_POST['track'])){
                $trackid = $_POST['trackid'];
                $trackstatus = $_POST['trackingstatus'];
                $trackUpdateQuery = "UPDATE `tracking_details` SET 
                                    `trackingstatus` = '$trackstatus',
                                    `trackdate` = '$date' WHERE `itemcode` = '$trackid'";
                $trackUpdateResult = mysqli_query($conn,$trackUpdateQuery);
                if($trackUpdateResult){
                    ?>
                    <script>
                        alert("Tracking Status Updated");
                        window.history.go(-3);
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert("Tracking Status Not Updated");
                        window.history.go(-3);
                    </script>
                    <?php
                }
            }
            ?>

                </center>

                </div> 
               
</main> 

</body>
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
