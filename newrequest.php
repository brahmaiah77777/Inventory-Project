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
            width:177px;
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
                    <select name="projectname" id="">
                    <option value="">Select</option>
                <?php
                        include "config.php";
                        $sql = "SELECT * FROM `project_details` ";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            
                    while ($role = mysqli_fetch_assoc($result)){
                            ?>
                        <option value="<?php echo $role["Projectid"];
                        
                        ?>">
                    <?php echo $role["Projectname"];
                   
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
                    <input type="text" name="remarks" id="">
                </td>
            </tr>
        </table>
   
    <h1>Inventory Details </h1>
   
    <table>
        <thead>
            <tr>
                <th name="Itemname">Item Name</th>
                <th>Available Count </th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <?php
             include "config.php";
             $sql = "SELECT * FROM `inventory_total_count_details`  ";
             $result = mysqli_query($conn,$sql);
             while($row = mysqli_fetch_array($result)){
             if($result->num_rows>0){
                    ?>
                    <tr>
                        <?php 
                        
                        if($row['Itemcode'] == 'ESCCCTV'){
                            ?>
                        <td name="cctv"><?php echo $row['Itemname'] ; ?> </td>
                        <td><?php echo $row['Itempendingcount']; ?></td>
                        <td>
                           <input type="number" name="cctvcount" id="" >
                        </td>
                        
                    </tr>
                        
                    <?php
                        }
                        ?>
                    <tr>
                        <?php 
                        if($row['Itemcode'] == 'ESCRDA'){
                            ?>
                        <td name="rda"><?php echo $row['Itemname'] ; ?> </td>
                        <td><?php echo $row['Itempendingcount']; ?></td>
                        <td>
                           <input type="number" name="rdacount" id="" >
                        </td>
                    </tr>
                        
                    <?php
                        }
                        ?>
                    <tr>
                        <?php 
                        if($row['Itemcode'] == 'ESCBCS'){
                            ?>
                        <td name="bcs"><?php echo $row['Itemname'] ; ?> </td>
                        <td><?php echo $row['Itempendingcount']; ?></td>
                        <td>
                           <input type="number" name="bcscount" id="" >
                        </td>
                    </tr>
                        
                    <?php
                        }
                        ?>
                    <tr>
                        <?php 
                        if($row['Itemcode'] == 'ESCBMD'){
                            ?>
                        <td name="bmd"><?php echo $row['Itemname'] ; ?> </td>
                        <td><?php echo $row['Itempendingcount']; ?></td>
                        <td>
                           <input type="number" name="bmdcount" id="" >
                        </td>
                    </tr>
                        
                    <?php
                        }
                        ?>
                    <tr>
                        <?php 
                        if($row['Itemcode'] == 'ESCPDR'){
                            ?>
                        <td name="pdr"><?php echo $row['Itemname'] ; ?> </td>
                        <td><?php echo $row['Itempendingcount']; ?></td>
                        <td>
                           <input type="number" name="pdrcount" id="" >
                        </td>
                    </tr>
                        
                    <?php
                        }
                        ?>
                    <tr>
                        <?php 
                        if($row['Itemcode'] == 'ESCPST'){
                            ?>
                        <td name="pst"><?php echo $row['Itemname'] ; ?> </td>
                        <td><?php echo $row['Itempendingcount']; ?></td>
                        <td>
                           <input type="number" name="pstcount" id="" >
                        </td>
                    </tr>
                        
                    <?php
                        }

                    }  }
            ?>
            <tr>
                <td colspan = "3">
                    <input type="submit" name="submit" id="">
                </td>
            </tr>
        </tbody>
    </table>
    </form>
    </center>

</body>
</html>

<?php
if(isset($_POST['submit'])){

    $projectname = $_POST['projectname'];
    $remarks = $_POST['remarks'];
    $cctvcount = $_POST['cctvcount'];
    $rdacount = $_POST['rdacount'];
    $bcscount = $_POST['bcscount'];
    $bmdcount = $_POST['bmdcount'];
    $pdrcount = $_POST['pdrcount'];
    $pstcount = $_POST['pstcount'];
    $result1 = $result2 = $result3 = $result4 = $result5 = $result6 = "";
    if($cctvcount == "" || $rdacount == "" || $bcscount == "" || $bmdcount == "" || $pdrcount == "" || $pstcount == "" ){
        ?>
        <script language="javascript">
            alert("please submit all the fields");
        </script>
        <?php
    }
    else{
        
    $requestQuery = "SELECT `requestid` FROM `inventory_request_details` WHERE `Projectid` = '$projectname'";
    $requestResult = mysqli_query($conn,$requestQuery);
    while($requestData = mysqli_fetch_assoc($requestResult))
    if($requestData != ""){
    $requestid = $requestData['requestid'];
    $selectQuery = "SELECT `Itemid`,`Itempendingcount` FROM `inventory_total_count_details`";
    $resultQuery = mysqli_query($conn,$selectQuery);
    $count = 0;
    while($rowData = mysqli_fetch_assoc($resultQuery)){
    
        if($count == 0){
            $itemid = $rowData['Itemid'];
            $pendingCount = $rowData['Itempendingcount'];
            if($bcscount <= $pendingCount){
               
            $sql1 = "INSERT INTO `itemwise_request_details` (`requestid`,`projectname`,`remarks`,`itemid`,`pendingcount`,`givencount`,`requestempid`) 
            VALUES ('$requestid','$projectname','$remarks','$itemid','$pendingCount','$bcscount','$id')";
            $result1 = mysqli_query($conn,$sql1);
            }
        }
        if($count == 1){
            $itemid = $rowData['Itemid'];
            $pendingCount = $rowData['Itempendingcount'];
            if($bmdcount <= $pendingCount){
               
            $sql2 = "INSERT INTO `itemwise_request_details` (`requestid`,`projectname`,`remarks`,`itemid`,`pendingcount`,`givencount`,`requestempid`) 
            VALUES ('$requestid','$projectname','$remarks','$itemid','$pendingCount','$bmdcount','$id')";
            $result2 = mysqli_query($conn,$sql2);
            }
        }
        if($count == 2){
            $itemid = $rowData['Itemid'];
            $pendingCount = $rowData['Itempendingcount'];
            if($cctvcount <= $pendingCount){
               
            $sql3 = "INSERT INTO `itemwise_request_details` (`requestid`,`projectname`,`remarks`,`itemid`,`pendingcount`,`givencount`,`requestempid`) 
             VALUES ('$requestid','$projectname','$remarks','$itemid','$pendingCount','$cctvcount','$id')";
            $result3 = mysqli_query($conn,$sql3);
            }
        }
        if($count == 3){
            $itemid = $rowData['Itemid'];
            $pendingCount = $rowData['Itempendingcount'];
            if($pdrcount <= $pendingCount){
               
            $sql4 = "INSERT INTO `itemwise_request_details` (`requestid`,`projectname`,`remarks`,`itemid`,`pendingcount`,`givencount`,`requestempid`) 
             VALUES ('$requestid','$projectname','$remarks','$itemid','$pendingCount','$pdrcount','$id')";
            $result4 = mysqli_query($conn,$sql4);
            }
        }
        if($count == 4){
            $itemid = $rowData['Itemid'];
            $pendingCount = $rowData['Itempendingcount'];
            if($pstcount <= $pendingCount){
                
            $sql5 = "INSERT INTO `itemwise_request_details` (`requestid`,`projectname`,`remarks`,`itemid`,`pendingcount`,`givencount`,`requestempid`) 
             VALUES ('$requestid','$projectname','$remarks','$itemid','$pendingCount','$pstcount','$id')";
            $result5 = mysqli_query($conn,$sql5);
            }
        }
        if($count == 5){
            $itemid = $rowData['Itemid'];
            $pendingCount = $rowData['Itempendingcount'];
            if($rdacount <= $pendingCount){
               
            $sql6 = "INSERT INTO `itemwise_request_details` (`requestid`,`projectname`,`remarks`,`itemid`,`pendingcount`,`givencount`,`requestempid`) 
            VALUES ('$requestid','$projectname','$remarks','$itemid','$pendingCount','$rdacount','$id')";
            $result6 = mysqli_query($conn,$sql6);
            }
        }
        $count++;

    }

    if($result1 == TRUE && $result2 == TRUE &&
       $result3 == TRUE && $result4 == TRUE &&
       $result5 == TRUE && $result6 == TRUE){
       
        ?>
        <script language="javascript">
    alert("Record inserted successfully");
</script>
<?php
       }

}
else{
    echo "This Project Does Not Exit";
}
    }
}
?>


<!-- 
<form action="" method="POST">
<table>
    <thead>
        <th>Item Name</th>
         <th>Available Count</th>
         <th>Count</th>
    </thead>
<tbody>
<?php
$itemQuery = "SELECT `Itemname`,`Itempendingcount` FROM `inventory_total_count_details` ";
$itemResult = mysqli_query($conn,$itemQuery);
while($itemRow = mysqli_fetch_assoc($itemResult)){
    $itemname = $itemRow['Itemname'];
    $pendingCount = $itemRow['Itempendingcount'];

    $separeteQuery = "SELECT * FROM `inventory_total_count_details` WHERE `Itemname` = '$itemname'";
    $separateResult = mysqli_query($conn,$separeteQuery);
    if($separateResult){
        ?>
         echo '<tr>
        <td>'.$itemname.'</td>
        <td>'.$pendingCount.'</td>
        <td><input type="number" name = "count"></td>
        </tr>';
        $count1 = $_POST['count'];
        $finalQuery = "INSERT INTO `itemwise_request_details` (`givencount`) VALUES ('$count1')";
        $finalResult = mysqli_query($conn,$finalQuery); 
        <tr>
        
                        <td name="cctv"><?php echo $itemname ; ?> </td>
                        <td><?php echo $pendingCount; ?></td>
                        <td>
                           <input type="number" name="cctvcount" id="" >
                        </td>
                    </tr>
                    <?php
                    
                    
    }}

    

?>

</tbody>
</table>
</form> -->
