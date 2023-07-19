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
    <title>New Request Page</title>
    
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
                    New Request
                    </h2>
                    <h2 style="position:relative ; left:280px; font-size:13px;">
                    <?php
                        // Set the new timezone
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
                <style>
        body{
            background:antiquewhite;
        }
        tr th {
            background-color: cadetblue;
   
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        tr td {
            padding: 9px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        table {
            margin: auto;
            width: 90%;
            border-style: none;
            border-spacing: 0;
            border-collapse: collapse;
            text-align: center;
            padding: 12px;
            border: 2px solid rgb(71, 71, 71);

        }
        form table{
            width:40%;
        }
        select{
            font-size:17px;
            width:193px;
        }
        .td{
            text-align:left;
        }
    </style>
</head>
<body>
    <center>
        <form action="" method="POST">

        <table>
            <tr>
                <td class = "td">Project Name </td>
                <td>
                    <select name="projectname" id="" required>
                    <option value="">Select</option>
                <?php
                        include "config.php";
                        $sql = "SELECT * FROM `inventory_request_details` ";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            
                    while ($role = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $role["Projectid"];
                        
                        ?>">
                    <?php echo $role["Projectdetails"];
                   
                            ?>
                        </option>
                            <?php
                            
                        }}
                  
                        ?>
                    </select>
                </td>
            </tr>
              
            <tr>
                <td class = "td">Remarks</td>
                <td>
                    <input type="text" name="remarks" id="" required>
                </td>
            </tr>
        </table>
   
    <h1>Add Request Items </h1>
   
    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <!-- <th>Available Count </th> -->
                <th>Requested Count</th>
            </tr>
        </thead>
       
            
                <tbody>
                    <tr>
                        <td>
                    <select name="itemname" id="" required>
                        <option value=""></option>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM `inventory_total_count_details` ";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            
                    while ($itemname = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $itemname["Itemname"];
                        
                        ?>">
                    <?php echo $itemname["Itemname"];
                   
                            ?>
                        </option>
                            <?php
                            
                        }}
                  
                        ?>
                        </td>
                        <td>
                            <input type="number" name="requestedcount" id="" required>
                        </td>
                    </tr>
                    </select>
                    </tbody>
                    <?php
                    
             
             ?>     
              <tr>
                <td>
                    <input type="submit" name="submit" id="">
                </td>
                <td>
                    <input type="submit" name="draft" id="" value = "save as draft">
                </td>
            </tr> 
                    
        
    </table>
    </form>
    </center>

</body>
</html>

<?php

if(isset($_POST['submit'])){
    $itemname = $_POST['itemname'];
    $requestcount = $_POST['requestedcount'];
    $remarks = $_POST['remarks'];
    $projectname = $_POST['projectname'];
    $date = date("y-m-d h:i:s");
    $requestQuery = "SELECT `requestid` FROM `inventory_request_details` WHERE `Projectid` = '$projectname'" ;
    $requestResult = mysqli_query($conn,$requestQuery);
    while($requestRow = mysqli_fetch_assoc($requestResult)){
        $requestid = $requestRow['requestid'];
    } 
    $availablecountQuery = "SELECT `Itemcode`,`Itempendingcount` FROM `inventory_total_count_details` WHERE `Itemname` = '$itemname'";
    $availablecountResult = mysqli_query($conn,$availablecountQuery);
    while($availablecountRow = mysqli_fetch_assoc($availablecountResult)){
        $availablecount = $availablecountRow['Itempendingcount'];
        $itemcode = $availablecountRow['Itemcode'];
    }
    if($availablecount >= $requestcount){

        $CheckItemQuery = "SELECT `requestid`,`projectname`,`itemid`,`itemname`
                           FROM `itemwise_request_details` WHERE 
                           `requestid` = '$requestid' AND `projectname` = '$projectname'
                            AND `itemid` = '$itemcode' AND `itemname` = '$itemname'";
        $CheckItemResult = mysqli_query($conn,$CheckItemQuery);
        if(mysqli_affected_rows($conn) >= 1){
            
            $UpdateItemQuery = "UPDATE `itemwise_request_details` 
                                SET `givencount` = `givencount` + '$requestcount'
                                WHERE `requestid` = '$requestid' 
                                AND `itemname` = '$itemname'";
            $UpdateItemResult = mysqli_query($conn,$UpdateItemQuery);
        }
        else{
    $requestitemQuery = "INSERT INTO `itemwise_request_details`
     (`requestid`,`projectname`,`remarks`,`itemname`,`givencount`,`approvaldate`,`itemid`,`pendingcount`,`submitstatus`,`requestempid`) 
      VALUES ('$requestid','$projectname','$remarks','$itemname','$requestcount','$date','$itemcode','$availablecount','1','$separateid') ";
    $requestitemResult = mysqli_query($conn,$requestitemQuery);
    }}
    else{
        ?>
        <script>
            alert("You enter more than a available count");
        </script>
        <?php
    }
    $selectitemQuery = "SELECT * FROM `itemwise_request_details` WHERE `requestid` = '$requestid'";
    $selectitemResult = mysqli_query($conn,$selectitemQuery);
    if(mysqli_affected_rows($conn) >= 1){
        ?>
        <h1 style = "text-align:center;">Request Items List</h1>
        <table>
            <thead>
                <th>S No</th>
                <th>Request Id</th>
                <th>Project Name</th>
                <th>Item Name</th>
                <th>Request Count</th>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while($selectitemRow = mysqli_fetch_assoc($selectitemResult)){
                    ?>
                    <tr>
                        <td><?php echo $count++ ; ?></td>
                        <td> <?php echo $selectitemRow['requestid'] ;?></td>
                        <td><?php echo $selectitemRow['projectname'] ;?></td>
                        <td><?php echo $selectitemRow['itemname'] ;?></td>
                        <td><?php echo $selectitemRow['givencount'] ;?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    else{
        echo "No data Found";
    }


}
elseif(isset($_POST['draft'])){
    $itemname = $_POST['itemname'];
    $requestcount = $_POST['requestedcount'];
    $remarks = $_POST['remarks'];
    $projectname = $_POST['projectname'];
    $date = date("y-m-d h:i:s");
    $requestQuery = "SELECT `requestid` FROM `inventory_request_details` WHERE `Projectid` = '$projectname'" ;
    $requestResult = mysqli_query($conn,$requestQuery);
    while($requestRow = mysqli_fetch_assoc($requestResult)){
        $requestid = $requestRow['requestid'];
    } 
    $availablecountQuery = "SELECT `Itemcode`,`Itempendingcount` FROM `inventory_total_count_details` WHERE `Itemname` = '$itemname'";
    $availablecountResult = mysqli_query($conn,$availablecountQuery);
    while($availablecountRow = mysqli_fetch_assoc($availablecountResult)){
        $availablecount = $availablecountRow['Itempendingcount'];
        $itemcode = $availablecountRow['Itemcode'];
    }
    if($availablecount >= $requestcount){
        $CheckItemQuery = "SELECT `requestid`,`projectname`,`itemid`,`itemname`
                           FROM `itemwise_request_details` WHERE 
                           `requestid` = '$requestid' AND `projectname` = '$projectname'
                            AND `itemid` = '$itemcode' AND `itemname` = '$itemname'";
        $CheckItemResult = mysqli_query($conn,$CheckItemQuery);
        if(mysqli_affected_rows($conn) >= 1){
            
            $UpdateItemQuery = "UPDATE `itemwise_request_details` 
                                SET `givencount` = `givencount` + '$requestcount'
                                WHERE `requestid` = '$requestid' 
                                AND `itemname` = '$itemname'";
            $UpdateItemResult = mysqli_query($conn,$UpdateItemQuery);
        }
        else{
    $requestitemQuery = "INSERT INTO `itemwise_request_details`
     (`requestid`,`projectname`,`remarks`,`itemname`,`givencount`,`approvaldate`,`itemid`,`pendingcount`,`submitstatus`,`requestempid`) 
      VALUES ('$requestid','$projectname','$remarks','$itemname','$requestcount','$date','$itemcode','$availablecount','0','$separateid') ";
    $requestitemResult = mysqli_query($conn,$requestitemQuery);
    }}
    else{
        ?>
        <script>
            alert("You enter more than a available count");
        </script>
        <?php
    }
    $selectitemQuery = "SELECT * FROM `itemwise_request_details` WHERE `requestid` = '$requestid'";
    $selectitemResult = mysqli_query($conn,$selectitemQuery);
    if(mysqli_affected_rows($conn) >= 1){
        ?>
        <h1 style = "text-align:center;">Request Items List</h1>
        <table>
            <thead>
                <th>S No</th>
                <th>Request Id</th>
                <th>Project Name</th>
                <th>Item Name</th>
                <th>Request Count</th>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while($selectitemRow = mysqli_fetch_assoc($selectitemResult)){
                    ?>
                    <tr>
                        <td><?php echo $count++ ; ?></td>
                        <td> <?php echo $selectitemRow['requestid'] ;?></td>
                        <td><?php echo $selectitemRow['projectname'] ;?></td>
                        <td><?php echo $selectitemRow['itemname'] ;?></td>
                        <td><?php echo $selectitemRow['givencount'] ;?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    else{
        echo "No data Found";
    }

}
?>
<a href="request.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    top:50px;">Back</a>
