
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
    <title>Request Edit Page</title>
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
                    Request Updation
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
                   
<?php
 include "config.php";
 $requestid = $_GET['editid'];
 $sql = "SELECT * FROM `itemwise_request_details` WHERE `requestid` = '$requestid' AND `submitstatus` = '0'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_affected_rows($conn) == 0){
    ?>
    <script>
        // alert("No Data Found");
        //window.history.go(-1);
    </script>
    <?php
 }
 else{
 while($row = mysqli_fetch_assoc($result))
 {
 $projectname = $row['projectname'];
 $remarks = $row['remarks'];
 }

?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>" method="post">
                    <table>
                        <thead>
                            <tr>
                                <td>Project Name</td>
                                <td>
                                    <input type="text" name="projectname" id="" value="<?php echo $projectname;?>">
                                </td>
                                <tr>
                                    <td>Remarks</td>
                                    <td>
                                        <input type="text" name="remarks" id="" value="<?php echo $remarks ;?>">
                                    </td>
                                </tr>
                            </tr>
                        </thead>
                       
                    </table>
                    <center>
                        <h1>Inventory Request</h1>
                    </center>
                    <table>
                        <thead>
                            <th>Item Id</th>
                            <th>Item Name</th>
                            <th>Available Count</th>
                            <th>Count</th>
                        </thead>
                        <tbody>
                            <?php
                            $itemQuery = "SELECT `itemid`,`pendingcount`,`givencount`,`itemname` FROM `itemwise_request_details` WHERE `requestid` = '$requestid' AND `requestempid` = '$separateid' AND`submitstatus` = 0";
                            $itemResult = mysqli_query($conn,$itemQuery);
                            $count = 0;
                            while($itemData = mysqli_fetch_array($itemResult)){
                                ?>
                                <tr>
                                    <td><?php echo $itemData['itemid'] ; ?></td>
                                    <td><?php echo $itemData['itemname'] ;?></td>
                                    <td><?php echo $itemData['pendingcount'] ; ?></td>
                                    <td>
                                    <input name="tableRow[<?php echo $count; ?>]" id='name' type='number' value="<?php echo $itemData['givencount']; ?>" >

                                    </td>
                                    <!-- <td><input type="text" name="" id="" value="<?php //echo $itemData['givencount']?>"></td> -->
                                </tr>
                                <?php
                                $count++;
                            }}
                            ?>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="update" id="" value="Update">
                                </td>
                                <td colspan="2">
                                    <input type="submit" name="draft" id="" value = "Save as draft">
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </form>
                    
<?php
   
    if(isset($_POST['update'])){
    $projectname = $_POST['projectname'];
    $remarks = $_POST['remarks'];

   

    $table = $_POST['tableRow'];
    $requestQuery = "SELECT `requestid` FROM `inventory_request_details` WHERE `Projectid` = '$projectname'";
    $requestResult = mysqli_query($conn,$requestQuery);
    while($requestData = mysqli_fetch_assoc($requestResult)){
    $requestid = $requestData['requestid'];


    }
    $requestItemQuery = "SELECT `itemid` FROM `itemwise_request_details` WHERE `requestid` = '$requestid' AND `submitstatus` = '0'";
    $requestItemResult = mysqli_query($conn,$requestItemQuery);
    while($requestItemRow = mysqli_fetch_assoc($requestItemResult)){
        $requestItemId = $requestItemRow['itemid'];
        
    }
    $selectQuery = "SELECT `Itemid`,`Itempendingcount`,`Itemname` FROM `inventory_total_count_details` WHERE `Itemcode` = '$requestItemId'";
    $resultQuery = mysqli_query($conn,$selectQuery);
    $count = 0;
    while($rowData = mysqli_fetch_array($resultQuery)){
    $Itemid = $rowData['Itemid'];
    $Itempendingcount = $rowData['Itempendingcount'];
    $itemname = $rowData['Itemname'];
    
   
        for($n=0; $n<count($table); $n++){
            if($count == $n){
                
        $sendCount = $table[$n];
    
        $givencountQuery = "SELECT `givencount` FROM `itemwise_request_details` WHERE `itemid` = '$Itemid' AND `submitstatus` = '0'";
                $givencountResult = mysqli_query($conn,$givencountQuery);
                while($givencountRow = mysqli_fetch_array($givencountResult)){
                    

                $givenRequestCount = $givencountRow['givencount'];
   
                    
        if($givenRequestCount >= $sendCount){
            
        
            $updateQuery = "UPDATE `itemwise_request_details` SET 
            `remarks` = '$remarks', 
            `itemid` = '$Itemid',
            `itemname` = '$itemname',
             `givencount` = '$sendCount',
              `requestempid` = '$separateid',
              `submitstatus` = '1'
               WHERE `requestid` = '$requestid' 
               AND `itemid` = '$Itemid' ";
            $updateResult = mysqli_query($conn,$updateQuery);
            
        }
    }      
        
    }

}
$count++;
    }

  ?>
   <script>
       alert("data updated successfully");
       window.history.go(-2);
    </script>
    <?php
}
    elseif(isset($_POST['draft'])){
        $projectname = $_POST['projectname'];
    $remarks = $_POST['remarks'];

   

    $table = $_POST['tableRow'];
    $requestQuery = "SELECT `requestid` FROM `inventory_request_details` WHERE `Projectid` = '$projectname'";
    $requestResult = mysqli_query($conn,$requestQuery);
    while($requestData = mysqli_fetch_assoc($requestResult)){
    $requestid = $requestData['requestid'];


    }
    $requestItemQuery = "SELECT `itemid` FROM `itemwise_request_details` WHERE `requestid` = '$requestid' AND `submitstatus` = '0'";
    $requestItemResult = mysqli_query($conn,$requestItemQuery);
    while($requestItemRow = mysqli_fetch_assoc($requestItemResult)){
        $requestItemId = $requestItemRow['itemid'];
        
    }
    $selectQuery = "SELECT `Itemid`,`Itempendingcount`,`Itemname` FROM `inventory_total_count_details` WHERE `Itemcode` = '$requestItemId'";
    $resultQuery = mysqli_query($conn,$selectQuery);
    $count = 0;
    while($rowData = mysqli_fetch_array($resultQuery)){
    $Itemid = $rowData['Itemid'];
    $Itempendingcount = $rowData['Itempendingcount'];
    $itemname = $rowData['Itemname'];
    
   
        for($n=0; $n<count($table); $n++){
            if($count == $n){
                
        $sendCount = $table[$n];
    
        $givencountQuery = "SELECT `givencount` FROM `itemwise_request_details` WHERE `itemid` = '$Itemid' AND `submitstatus` = '0'";
                $givencountResult = mysqli_query($conn,$givencountQuery);
                while($givencountRow = mysqli_fetch_array($givencountResult)){
                    

                $givenRequestCount = $givencountRow['givencount'];
   
                    
        if($givenRequestCount >= $sendCount){
            
        
            $updateQuery = "UPDATE `itemwise_request_details` SET 
            `remarks` = '$remarks', 
            `itemid` = '$Itemid',
            `itemname` = '$itemname',
             `givencount` = '$sendCount',
              `requestempid` = '$separateid',
              `submitstatus` = '0'
               WHERE `requestid` = '$requestid' 
               AND `itemid` = '$Itemid' ";
            $updateResult = mysqli_query($conn,$updateQuery);
            
        }
    }      
        
    }

}
$count++;
    }

  ?>
   <script>
       alert("data updated successfully");
       window.history.go(-2);
    </script>
    <?php
}
    
    ?>
    
    
   
    <a href="request.php" style= "font-size: 25px;
                                border: 2px solid blue;
                                border-radius: 10px;
                                padding: 10px;
                                position:relative;
                                bottom:50px;">Back</a>
