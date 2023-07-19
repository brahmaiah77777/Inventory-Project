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
$separateQuery = "SELECT `inventorylist` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['inventorylist'] == 1){

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invenotry Page</title>
   
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="hover.css">

    <style>
        span > img{
            width:115px;
        }
        h1 {
    text-align: center;
    
}

form {
    color: red;
    font-size: 20px;
}

select {
    font-size: 20px;
}

.rowdata {
    background-color: rgb(226, 225, 225);
}

tr th {
    background-color: #5f9ea0;
    padding: 10px;
    color: white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size:15px;

}

tr td {
    padding: 9px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

table {
    margin: auto;
    width: 85%;
    border-style: none;
    border-spacing: 0;
    border-collapse: collapse;
    text-align: center;
    padding: 12px;
    border: 2px solid rgb(71, 71, 71);

}

.submitdiv {
    text-align: center;

}

button {
    background-color: green;
    font-size: 20px;
}
button{
    padding: 0;
border: none;
background: none;
}
a{
    text-decoration:none;
    color:brown;
}
td,th{
    text-align:left;
}
center a{
   
    color:blue;
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
    <div class="main-content">
            <header>
                <h2 class="heading" id="dashboard">
                    Inventory
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
                 
</head>
<body>
<?php

include "config.php";
$sql = "SELECT * FROM `inventory_total_count_details`";
$result = $conn->query($sql);
?>
<a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    position:relative;
    top:20px;">Back</a>
<center>
</center>
    <h1>Inventory Details</h1>
    <a href="newitems.php" style= "    position: relative;
    left: 800px;
    bottom: 28px;
    font-size: 20px;
    border: 2px solid;
    border-radius: 10px;
    padding: 10px;
    color: black;">Add New Invenotry </a>
    

<form action="" mehod="POST">
    <table>
        <thead>
            
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Total Count</th>
            
            <th>Item Scrap Count</th>
            <th>Available Count</th>

        </thead>
        <tbody>
            <?php
            $ItemQuery = "SELECT * FROM `inventory_total_count_details`";
            $ItemResult = mysqli_query($conn,$ItemQuery);
            while($ItemData = mysqli_fetch_assoc($ItemResult)){
                $Itemid = $ItemData['Itemid'];
                $Itemcode = $ItemData['Itemcode'];
                $Itemname = $ItemData['Itemname'];
                $Totalcount = $ItemData['Totalcount'];
                $Iteminusecount = $ItemData['Iteminusecount'];
                $Itemscrapcount = $ItemData['Itemscrapcount'];
                $Itempendingcount = $ItemData['Itempendingcount'];
                echo
                '<tr>
               
                <td><button class="btn btn-primary"><a href="Items.php? itemcode='.$Itemcode.' ">'.$Itemcode.'</td>
                <td>'.$Itemname.'</td>
                <td style="text-align:center;">'.$Totalcount.'</td>
               
                <td style="text-align:center;">'.$Itemscrapcount.'</td>
                <td style="text-align:center;">'.$Itempendingcount.'</td>
                </tr>
                ';

            }
            ?>
        </tbody>
    </table>
</form>


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