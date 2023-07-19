    
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
    <title>Approval Request page</title>
    
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
            text-align:center;
        }
        .dropdown:hover .dropbtn {
            background-color: red;
    
        }
        h1{
            color:blueviolet;
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
                    Approval Request
                    </h2>
                    <h2 style="position:relative ; left:285px; font-size:13px;">
                    <?php
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

                <center>
    
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
            width: 60%;
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
            font-size:20px;
        }
    </style>
</head>
<body>
<?php
$projectname = $_GET['projectname'];
$projectQuery = mysqli_query($conn,"SELECT `Projectid` FROM `project_details` WHERE `projectname` = '$projectname'");
while($projectRow = mysqli_fetch_assoc($projectQuery)){
    $projectid = $projectRow['Projectid'];
}
?>
<center>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"  method= "post">
    <table>
        <tbody>
            <tr>
                <td>Project Name : </td>
                <td>
                    <input type="text" name="projectname" id="" value = "<?php echo $projectname ;?>" readonly>
                </td>
            </tr>
        </tbody>
    </table>

     </center>
     <center>
    <h1>Inventory Details </h1>
    
            <?php
             include "config.php";
             $sql = "SELECT * FROM `inventory_total_count_details` ";
             $result = mysqli_query($conn,$sql);
             

             if($result->num_rows>0){
                ?>
                <table>
        <thead>
            <tr>
                <th name="Itemname">Item name</th>
                <th>Total Count</th>
                <th>Requested Count</th>
                <th>Approved Count</th>
                <th>Approval remarks</th>
            </tr>
            
        </thead>
        <tbody>
                <?php
             
             $count = 0;
             while($row = mysqli_fetch_array($result)){
                $itemcode = $row['Itemcode'];
                $requestItemQuery = "SELECT `givencount` FROM `itemwise_request_details` WHERE `projectname` = '$projectid' AND `itemid` = '$itemcode' AND `submitstatus` = 1 ";
             $requestItemResult = mysqli_query($conn,$requestItemQuery);
             while($requetsItemRow = mysqli_fetch_assoc($requestItemResult)){
                $givencount =  $requetsItemRow['givencount'];
             
                ?>
                <tbody>
                    <tr>
                    <td ><a style="color:black; text-decoration: none;" href="?itemname=<?=$row['Itemname'];?>"><?=$row['Itemname'];?></a></td>
                    <td ><a style="color:black; text-decoration: none;" href="?pendingcount=<?=$row['Itempendingcount'];?>"><?=$row['Itempendingcount']; ?></a></td>
                    <td ><a style="color:black; text-decoration: none;" href="?givencount=<?=$givencount ;?>"><?=$givencount; ?></a></td>

                <td>
                <input name="tableRow[<?php echo $count; ?>]" id='name' type='text' >
                </td>
                <td>  
                <textarea name="tableRow2[<?php echo $count; ?>]" id='name2' type='text' ></textarea>
                </td>
                   
                    </tr>
                    </tbody>
                    
                    <?php
                    $count++;
                  
             }
            }
             ?>     
                    <?php
                }
             
            ?>
            
            <tr>
                <td colspan = "4">
                    <input type="submit" name="submit" id="" value = "Approve">
                </td>
                <td colspan = "3">
                    <input type="submit" name="draft" id="" value= "save as draft">
                </td>
            </tr>
        </tbody>
    </table>
    </form>


<?php
if(isset($_POST['submit'])){
    $projectname = $_POST['projectname'];
    
    $table = $_POST['tableRow'];
    $table2 = $_POST['tableRow2'];
    $requestQuery = "SELECT `requestid` FROM `inventory_request_details` WHERE `Projectdetails` = '$projectname'";
    $requestResult = mysqli_query($conn,$requestQuery);
    while($requestData = mysqli_fetch_assoc($requestResult))
    $requestid = $requestData['requestid'];
    $requestItemsQuery = mysqli_query($conn,"SELECT `itemid` FROM `itemwise_request_details` WHERE `requestid` = '$requestid'");
    while($requestItemRow = mysqli_fetch_assoc($requestItemsQuery)){
        $requestItemId = $requestItemRow['itemid'];

    }
    
    $selectQuery = "SELECT `Itemid`,`Itempendingcount` FROM `inventory_total_count_details` WHERE `Itemcode` = '$requestItemId'";
    $resultQuery = mysqli_query($conn,$selectQuery);
   
    $count = 0;
    $count2 = 0;
    while($rowData = mysqli_fetch_array($resultQuery)){
    $Itemid = $rowData['Itemid'];

    $Itempendingcount = $rowData['Itempendingcount'];
        for($n=0; $n<count($table); $n++){
            if($count == $n){
                $sendCount = $table[$n];
                $remarks = $table2[$n];
                $givencountQuery = "SELECT `givencount` FROM `itemwise_request_details` WHERE `itemid` = '$Itemid'";
                $givencountResult = mysqli_query($conn,$givencountQuery);
                while($givencountRow = mysqli_fetch_array($givencountResult)){

                $givenRequestCount = $givencountRow['givencount'];
                if($givenRequestCount >= $sendCount){
                         
        $itemIncreaseQuery = "UPDATE `inventory_total_count_details` SET 
                                    `Itempendingcount` = `Itempendingcount` - '$sendCount'
                                    WHERE `Itemid` = '$Itemid'";
        $itemIncreaseResult = mysqli_query($conn,$itemIncreaseQuery);
        
        
        $query1 = "UPDATE `itemwise_request_details` SET
         `approval1count` = `approval1count` + '$sendCount' ,
         `givencount` = `givencount` - '$sendCount',
         `approval1id` = '$separateid',
         `approvaldate` = '$date',
          `approval1remarks` = '$remarks' WHERE `itemid` = '$Itemid' AND `requestid` = '$requestid'";
        $result1 = mysqli_query($conn,$query1);
        
    
        }
    }
    }
}
    
// for($k=0 ; $k<count($table2); $k++){
//     if($count2 == $k){
//         $remarks = $table2[$k];
//       //  $query2 = "UPDATE `itemwise_request_details` SET `approval1remarks` = '$remarks' WHERE `approval1remarks`= '' ";
//         //$result2 = mysqli_query($conn,$query2);
// }
//      }
$count++;
$count2++;
    } 
    ?>
    <script>
      //  alert("Remarks Updarted");
      window.history.go(-3);
    </script>
    <?php
}
?>
</table>
</center>
</form>



</center>

</div> 
               
</main> 

</body>
</html>
