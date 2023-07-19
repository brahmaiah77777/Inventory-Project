
<?php
session_start();
include "config.php";
$query = mysqli_query($conn,"SELECT * FROM `employcreation` WHERE `empid`='".$_SESSION['empid']."' AND `password` = '".$_SESSION['password']."'");
while($row = mysqli_fetch_row($query)){
     $id = $row[4];
     $name = $row[1];
     $separateid = $row[0];
}
session_write_close();
unset($_SESSION);
session_start();
?>

<?php
$separateQuery = "SELECT `inventorydispatch` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['inventorydispatch'] == 1){

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory  Dispatch</title>
   
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
                    Inventory Dispatch
                    </h2>

                <div class="user-wrapper">
                    <img src="https://assets.codepen.io/3853433/internal/avatars/users/default.png?format=auto&version=1617122449&width=40&height=40"
                        alt="">
                    <div>
                        <h4><?php echo $name ; ?></h4>
                        <h3><a href="index.php">Logout</a></h3>
                    </div>
                </div>
            </header>
           
             <main style="margin-top:0px;">
             <center>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"  method= "POST">

    <table style="width:60%;">
        <tbody>
            <tr>
                <td class = "td">Project Name : </td>
                <td>
                    <select name="projectname" id="">
                        <option value="select">Select</option>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM `project_details` WHERE `Projectstatus` = 'Active'";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                    while ($category = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $category["Projectid"];
                        
                        ?>">
                    <?php echo $category["Projectname"];
                   
                            ?>
                        </option>
                            <?php
                            
                        }
                    }
                  
                        ?>
                      
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" id="">
                </td>
            </tr>
        </tbody>
    </table>

    </center>
 
    
            <?php
            include "config.php";
            if(isset($_POST['submit'])){
            
                $projectname = $_POST['projectname'];
                $_SESSION['projectname'] = $_POST['projectname'];
                $projectQuery = "SELECT `requestid`,`itemid`,`projectname`,`givencount` FROM `itemwise_request_details` WHERE `projectname` = '$projectname'";
                $projectResult = mysqli_query($conn,$projectQuery);
                
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
                    <table>
            <thead>
                <th>S No</th>
                <th>Request Id</th>
                <th>Project Id</th>
                <th>Inventory Item Id</th>
                <th>Inventory Count</th>
            </thead>
            <tbody>
                <?php
                $number = 1;
                while($projectRow = mysqli_fetch_assoc($projectResult)){

                    $RequestId = $projectRow['requestid'];
                    $_SESSION['requestid'] = $projectRow['requestid'];
                    $ProjectId = $projectRow['projectname'];
                    $ItemId = $projectRow['itemid'];
                    $ItemCount = $projectRow['givencount'];
                    
                    echo '<tr>
                    <td>'.$number++.'</td>
                    <td>'.$RequestId.'</td>
                    <td>'.$ProjectId.'</td>
                    <td>
                    <button class="btn btn-primary" style="border:none;"><a href="trackingid.php? trackingid='.$ItemId.' " class="text-light">'.$ItemId.'</a></button>
                    
                    </td>
                    <td>'.$ItemCount.'</td>
                    </tr>';
                }
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>   
            
    </table>
</form>

    <a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    position:relative;
    top:30px;">Back</a>

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
