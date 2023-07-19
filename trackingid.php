
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
             
            
                    
             
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <table>
                    <thead>
                        <th>Dispatch Id</th>
                       
                        <th>Bar Code Id </th>
                        <th>Submit</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="trackid" id="" style="border:none; text-align:center;" readonly value = "<?php echo $_GET['trackingid'] ; ?>"></td>

                            <?php
                            if($_GET['trackingid'] == "ESC_PST"){
                                ?>
                                <td>
                                    <select name="psta" id="" required>
                                        <option value="">select</option>
                                        <?php
                                        $psta = "SELECT `barcodeid` FROM `inventory_itemvise_details` WHERE `subitemname` = 'Chest Box'";
                                        $pstaa = mysqli_query($conn,$psta);
                                        if($pstaa){
                                            while($pstaaa = mysqli_fetch_assoc($pstaa)){
                                                ?>
                                                <option value="<?php echo $pstaaa['barcodeid']?>">
                                            <?php echo $pstaaa['barcodeid'] ;?>
                                            </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="pstb" id="" required>
                                        <option value="">select</option>
                                        <?php
                                        $pstb = "SELECT `barcodeid` FROM `inventory_itemvise_details` WHERE `subitemname` = 'Head'";
                                        $pstbb = mysqli_query($conn,$pstb);
                                        if($pstbb){
                                            while($pstbbb = mysqli_fetch_assoc($pstbb)){
                                                ?>
                                                <option value="<?php echo $pstbbb['barcodeid']?>">
                                            <?php echo $pstbbb['barcodeid'] ;?>
                                            </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="pstc" id="" required>
                                        <option value="">select</option>
                                        <?php
                                        $pstc = "SELECT `barcodeid` FROM `inventory_itemvise_details` WHERE `subitemname` = 'Base'";
                                        $pstcc = mysqli_query($conn,$pstc);
                                        if($pstcc){
                                            while($pstccc = mysqli_fetch_assoc($pstcc)){
                                                ?>
                                                <option value="<?php echo $pstccc['barcodeid']?>">
                                            <?php echo $pstccc['barcodeid'] ;?>
                                            </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="pstd" id="" required>
                                        <option value="">select</option>
                                        <?php
                                        $pstd = "SELECT `barcodeid` FROM `inventory_itemvise_details` WHERE `subitemname` = 'Controller'";
                                        $pstdd = mysqli_query($conn,$pstd);
                                        if($pstdd){
                                            while($pstddd = mysqli_fetch_assoc($pstdd)){
                                                ?>
                                                <option value="<?php echo $pstddd['barcodeid']?>">
                                            <?php echo $pstddd['barcodeid'] ;?>
                                            </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <?php
                            }
                            else{
                            ?>
                            <td>
                                <select name="barcodeid" id="">
                                    <option value="">select</option>
                                    <?php
                                    $dropdown = "SELECT `barcodeid` FROM `inventory_itemvise_details` WHERE `Itemcode`  = '".$_GET['trackingid']."'  ";
                                    $dropdownResult = mysqli_query($conn,$dropdown);
                                    if($dropdownResult){
                                        while($dropdownRow = mysqli_fetch_assoc($dropdownResult)){
                                            ?>
                                            <option value="<?php echo $dropdownRow["barcodeid"];
                                            
                                            ?>">
                                        <?php echo $dropdownRow["barcodeid"];
                                       
                                                ?>
                                            </option>
                                                <?php
                                        }
                                    }}
                                    ?>
                                </select>
                            </td>
                            <td><input type="submit" name="submit" id=""></td>
                        </tr>
                    </tbody>
                </table>
                </form>
    </center>
    <?php
    if(isset($_POST['submit'])){
       
        $trackid = $_POST['trackid'];
        $barcodeid =  $_POST['barcodeid'];
        $ChestBox = $_POST['psta'];
        $Head = $_POST['pstb'];
        $Base = $_POST['pstc'];
        $Controller = $_POST['pstd'];
        if(empty($trackid)){
            ?>
            <script>
                alert("Select Barcode id from the list");
                window.history.go(-1);
            </script>
            <?php
        }
        else{
            
        $projectQuery = "SELECT `requestid`,`projectname`,`itemid` FROM `itemwise_request_details` WHERE `itemid` = '$trackid'";
        $projectResult = mysqli_query($conn,$projectQuery);
        
        while($projectRow = mysqli_fetch_assoc($projectResult)){
            $itemid = $projectRow['itemid'];
            $projectid = $projectRow['projectname'];
            $requestid = $projectRow['requestid'];
            
            if($itemid == $trackid && $projectid == $_SESSION['projectname']){
            $subItemQuery = "SELECT `subitemid`,`Itemcode` FROM `inventory_itemvise_details` WHERE `Itemcode` = '$itemid'";
            $subItemResult = mysqli_query($conn,$subItemQuery);
            while($subItemRow = mysqli_fetch_assoc($subItemResult)){

            $subitemid = $subItemRow['subitemid'];
            $Itemcode = $subItemRow['Itemcode'];
            if($barcodeid == $subitemid){
                if($Itemcode == "ESC_PST"){

                    
                    $ChestBoxQuery = "INSERT INTO `tracking_details` 
                                  (`itemcode`,`subitemid`,`barcodeid`,`projectid`)
                                  VALUES 
                                  ('$trackid','$ChestBox','$ChestBox','$projectid')";
                    $ChestBoxResult = mysqli_query($conn,$ChestBoxQuery);

                    $HeadQuery = "INSERT INTO `tracking_details` 
                                  (`itemcode`,`subitemid`,`barcodeid`,`projectid`)
                                  VALUES
                                  ('$trackid','$Head','$Head','$projectid')";
                    $HeadResult = mysqli_query($conn,$HeadQuery);

                    $BaseQuery = "INSERT INTO `tracking_details` 
                                  (`itemcode`,`subitemid`,`barcodeid`,`projectid`)
                                  VALUES
                                  ('$trackid','$Base','$Base','$projectid')";
                    $BaseResult = mysqli_query($conn,$BaseQuery);

                    $ControllerQuery = "INSERT INTO `tracking_details` 
                                        (`itemcode`,`subitemid`,`barcodeid`,`projectid`)
                                        VALUES
                                        ('$trackid','$Controller','$Controller','$projectid')";
                    $ControllerResult = mysqli_query($conn,$ControllerQuery);

                }
                else{
            $trackingQuery = "INSERT INTO `tracking_details` (`itemcode`,`subitemid`,`barcodeid`,`projectid`,`requestid`) VALUES ('$trackid','$subitemid','$barcodeid','$projectid','$requestid')";
    
            $trackingResult = mysqli_query($conn,$trackingQuery);
                }
            ?>
           
        
            <?php
        
    }}
    
    break;
            }
        
        }
        
    }
    ?>
      <script>
                // alert("Tracking Updated");
                 window.history.go(-1);
            </script> 
            
    <?php
        
    }
    ?>
            <?php
                    
                    $trackingid  = $_GET['trackingid'];
                
                    $sql = "SELECT * FROM `tracking_details` WHERE `itemcode` = '$trackingid' AND `projectid` = '".$_SESSION['projectname']."' ";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_affected_rows($conn) >=1){ 
                        ?>
                    <table>
                    <thead>
                        <th>S No</th>
                        <th>Item Id</th>
                        <th>Sub Item Id</th>
                       
    
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                        <td>'.$count++.'</td>
                        <td>'.$row["itemcode"].'</td>
                        <td>'.$row["subitemid"].'</td>
                       
                        </tr>';
                    }}
                    ?>
                </tbody>
            </table>
 
    
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
