
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
$separateQuery = "SELECT `inventorycreation` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['inventorycreation'] == 1){

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Inventory Page</title>
   
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="hover.css">
    <style>
         span > img{
            width:115px;
        }
        tr th {
            background-color: forestgreen;
            padding: 10px;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        tr td {
            padding: 9px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        h1{
            text-align : center;
        }

        table {
            margin: auto;
            width: 50%;
            border-style: none;
            border-spacing: 0;
            border-collapse: collapse;
            text-align: center;
            padding: 12px;
            border: 2px solid rgb(71, 71, 71);

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
                    Add New Inventory
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
   
      
<?php
function input_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $itemidErr = $itemcodeErr = $itemnameErr = "";
  $itemid1 = $itemcode1 = $itemname1 = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_POST["itemid"])){
        $itemidErr = "itemid is required";
    }
    else{
        $itemid1 = input_data($_POST["itemid"]);
        if(!preg_match("/^['a-zA-Z0-9_]*$/",$itemid1)){
            $itemidErr = "only alphabets and digits allowed";
        }
    }
    if(empty($_POST["itemcode"])){
        $itemcodeErr = "itemcode is required";
    }
    else{
        $itemcode1 = input_data($_POST["itemcode"]);
        if(!preg_match("/^['a-zA-Z']*$/",$itemcode1)){
            $itemcodeErr = "only alphabets are allowed";
        }
    }
    if(empty($_POST["itemname"])){
        $itemnameErr = "itemname is required";
    }
    else{
        $itemname1 = input_data($_POST["itemname"]);
        if(!preg_match("/^['a-zA-Z_ ']*$/",$itemname1)){
            $itemnameErr = "only alphabets are allowed";
        }
    }
  }
  
?> 
    <h1>Add New Invenotry Details</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <table>
        <tr>
            <td class = "td">Item Id :</td>
            <td>
                <input type="text" name="itemid" id="">
            </td>
            <td>
                <span class="error">*<?php echo $itemidErr; ?> </span>
            </td>
        </tr>
        <tr>
            <td class = "td">Item Code :</td>
            <td>
                <input type="text" name="itemcode" id="">
            </td>
            <td>
                <span class="error">* <?php echo $itemcodeErr; ?> </span>
            </td>
           
        </tr>
        <tr>
            <td class = "td">Item Name :</td>
            <td>
                <input type="text" name="itemname" id="">
            </td>
            <td>
                <span class="error">* <?php echo $itemnameErr; ?> </span>
            </td>
        </tr>
        <tr>
            <td class = "td">Total Count :</td>
            <td>
                <input type="number" name="totalcount" id="">
            </td>
            
        </tr>
        <tr>
            <td class = "td">Item In Use Count :</td>
            <td>
                <input type="number" name="iteminusecount" id="">
            </td>
        </tr>
        <tr>
            <td class = "td">Item Scrap Count :</td>
            <td>
                <input type="number" name="itemscrapcount" id="">
            </td>
        </tr>
        <tr>
            <td class = "td">Available Count :</td>
            <td>
                <input type="number" name="itempendingcount" id="">
            </td>
        </tr>
        <tr>
            <td colspan="3" >
                <input type="submit" name="add" id="" value="ADD">
            </td>
           
        </tr>
    </table>

</form>


<?php
   include "config.php";

  if(isset($_POST['add'])){
    if($itemidErr == "" && $itemcodeErr == "" && $itemnameErr == ""){
    $itemid = $_POST['itemid'];
    $itemcode = $_POST['itemcode'];
    $itemname = $_POST['itemname'];
    $totalcount = $_POST['totalcount'];
    $iteminusecount = $_POST['iteminusecount'];
    $itemscrapcount = $_POST['itemscrapcount'];
    $itempendingcount = $_POST['itempendingcount'];
    $date = date("y-m-d h:i:s");
    $sql = "INSERT INTO `inventory_total_count_details`
           (`Itemid`, `Itemcode`, `Itemname`, `Totalcount`,
            `Iteminusecount`, `Itemscrapcount`,
             `Itempendingcount`,`createdby`,`createdon`)
              VALUES ('$itemid','$itemcode','$itemname',
              '$totalcount','$iteminusecount','$itemscrapcount',
              '$itempendingcount','$separateid','$date')";

    $query  = mysqli_query($conn,$sql);
    if($query){
        echo "<b> data inserted successfully . </b>";
    }
   
  }
}
?>

<a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    top:50px;">Back</a>
                
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