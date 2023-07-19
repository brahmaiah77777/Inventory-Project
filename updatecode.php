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

  
  
  include "config.php";
  $itemcodeid = $_GET['updatecode'];
  $sql = "SELECT * FROM `inventory_itemvise_details` WHERE `subitemid` = '$itemcodeid' ";
  $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_assoc($result);
  $Itemcode = $row['Itemcode'];
  $itemcodeid = $row['subitemid'];
  $Itemname = $row['subitemname'];
  

  if(isset($_POST['update'])){
    $Itemcode = $_POST['Itemcode'];
    $itemcodeid = $_POST['itemcodeid'];
    $Itemname = $_POST['Itemname']; 
    $date = date("y-m-d h:i:s");
   

    $sql = "UPDATE `inventory_itemvise_details` SET `Itemcode` = '$Itemcode',
                    `subitemid` ='$itemcodeid',
                     `subitemname` ='$Itemname' ,
                     `updatedby` = '$separateid',
                     `updatedon` = '$date',
                     `barcodeid` = '$itemcodeid'
                                      
                                        WHERE  `subitemid` = '$itemcodeid' ";
    $result = mysqli_query($conn,$sql);
    if($result){
        
        ?>
        <script language="javascript">
            alert("data updated");
            window.history.go(-3);
        </script>
        <?php
        // header("location:newinventory.php");
       //UPDATE TABLENAME SET COLUMNNAME = REPLACE(COLUMNNAME,EXSTINGNAME,REPLACENAME)
        
    }
    

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Items Page</title>
    
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
        .error {
            color: #FF0001;
            
        }

        h1{
            text-align:center;
            color:red;


        }

        .form  {
            padding: 0;
            margin: 0;
            font-family: 'Rajdhani', sans-serif;
            box-sizing: border-box;
            outline: none;
            user-select: none;
            list-style-type: none;
            text-decoration: none;
            transition: all 400ms;
            overflow-x: hidden;
            background-color: bisque;
            
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
                    Items Updation
                    </h2>
                    <h2 style="position:relative ; left:280px; font-size:13px;">
                    <?php
                        
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date("y-m-d h:i:s");
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

 
<h1>Items Updation </h1>
<center>
<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <table>
        <tr>
            <td>Item Code  :</td>
            <td>
                <input type="text" name="Itemcode" id="" value="<?php echo $Itemcode ; ?>">
            </td>
            <td>
                <span class="error">* </span>
            </td>   
        </tr>
        <tr>
            <td>Sub Item Id  :</td>
            <td>
                <input type="text" name="itemcodeid" id="" value="<?php echo $itemcodeid ; ?>">
            </td>
            <td>
                <span class="error">* </span>
            </td>
        </tr>
        <tr>
            <td>Sub Item Name    :   
            </td>
            <td>
                <input type="text" name="Itemname" id="" value="<?php echo $Itemname ; ?>">
            </td>
            <td>
                <span class="error">*</span>
            </td>
        </tr>
       
        <tr>
            <td colspan="4" >
                <input type="submit" name="update" id="" value="Update">
            </td>
            
        </tr>
<br><br>
</table>

</center>
</form>


  
</main> 
<a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    bottom:100px;">Back</a>
</body>
</html>



