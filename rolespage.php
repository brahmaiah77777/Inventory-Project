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
$separateQuery = "SELECT `roles` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
    if($separateRow['roles'] == 1){

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles Page</title>
   
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="hover.css">

    <style>
        .main-content{
            margin-left:165px;
        }
         span > img{
            width:115px;
        }
        td{
            border:1px solid blue;
        }
        h1{
            text-align:center;
        }
        body{
            background-color:pink;
        }
        tr th {
            background-color: #5f9ea0;
            padding: 2px;
            color:  aliceblue;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        tr td {
            padding:7px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
        input{
            font-size:25px;
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
                    All Roles
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

    <?php
    include "config.php";

    ?>
     
<h1>Role Details</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="post"  id="form">
        <table>
            <tr>
                <th>Name</th>
                <th>User List</th>
                <th>User Creation</th>
                <th>User Update</th>
                <th>User Delete</th>
                <th>Roles</th>
                <th>Inventory List</th>
                <th>Create Inventory</th>
                <th>Request List</th>
                <th>Create Request</th>
                <th>Report</th>
                <th>Approval Rejected Status</th>
                <th>Project List</th>
                <th>Project Creation</th>
                <th>Project Update</th>
                <th>Project Delete</th>
                <th>Inventory Dispatch</th>
                <th>Inventory Tracking</th>
                
            </tr>
            <tr>
                <td>Incharge</td>
                <td>
                    <input type="checkbox" name="checkbox11" id="checkbox11" value="1"  
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `employeelist` FROM `rolemasterinfo` WHERE `employeelist` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeelist'] == 1){
                                                    echo 'checked="checked"';
                                                
                                                }
                                            }
                                           }
                                           ?>
                                           <?php
                                            if(isset($_POST['checkbox11'])) {
                                             echo 'checked="checked"';
                                        } 
                                        ?> >
                                           
                </td>
                <td>
                    <input type="checkbox" name="checkbox12" id="checkbox12"  value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeecreation` FROM `rolemasterinfo` WHERE `employeecreation` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeecreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox12'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                
                <td>
                    <input type="checkbox" name="checkbox13" id="checkbox13" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeeupdate` FROM `rolemasterinfo` WHERE `employeeupdate` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeeupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox13'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox14" id="checkbox14" value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeedelete` FROM `rolemasterinfo` WHERE `employeedelete` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeedelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox14'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox15" id="checkbox15" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `roles` FROM `rolemasterinfo` WHERE `roles` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['roles'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           } 
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox15'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
              
                <td>
                    <input type="checkbox" name="checkbox16" id="checkbox16" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorylist` FROM `rolemasterinfo` WHERE `inventorylist` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorylist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox16'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox17" id="checkbox17" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorycreation` FROM `rolemasterinfo` WHERE `inventorycreation` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorycreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox17'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
               
                <td>
                    <input type="checkbox" name="checkbox18" id="checkbox18" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `requestlist` FROM `rolemasterinfo` WHERE `requestlist` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox18'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox19" id="checkbox19" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `requestcreation` FROM `rolemasterinfo` WHERE `requestcreation` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox19'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox10" id="checkbox10" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `report` FROM `rolemasterinfo` WHERE `report` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['report'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox10'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
         
                <td>
                    <input type="checkbox" name="checkbox111" id="checkbox111" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `approvalrejectedstatus` FROM `rolemasterinfo` WHERE `approvalrejectedstatus` = 1 AND  `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['approvalrejectedstatus'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox111'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox112" id="checkbox112" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectlist` FROM `rolemasterinfo` WHERE `projectlist` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox112'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox113" id="checkbox113" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectcreation` FROM `rolemasterinfo` WHERE `projectcreation` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox113'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox114" id="checkbox114" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectupdate` FROM `rolemasterinfo` WHERE `projectupdate` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox114'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox115" id="checkbox115" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectdelete` FROM `rolemasterinfo` WHERE `projectdelete` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectdelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox115'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox116" id="checkbox116" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorydispatch` FROM `rolemasterinfo` WHERE `inventorydispatch` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorydispatch'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox116'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox117" id="checkbox117" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorytracking` FROM `rolemasterinfo` WHERE `inventorytracking` = 1 AND `roleid` = 0001";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorytracking'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox117'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
               
                
            </tr>
            <tr>
                <td>Developer</td>
                <td>
                    <input type="checkbox" name="checkbox21" id="checkbox21" value="1"  
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `employeelist` FROM `rolemasterinfo` WHERE `employeelist` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeelist'] == 1){
                                                    echo 'checked="checked"';
                                                
                                                }
                                            }
                                           }
                                           ?>
                                           <?php
                                            if(isset($_POST['checkbox21'])) {
                                             echo 'checked="checked"';
                                        } 
                                        ?> >
                                           
                </td>
                <td>
                    <input type="checkbox" name="checkbox22" id="checkbox22"  value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeecreation` FROM `rolemasterinfo` WHERE `employeecreation` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeecreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox22'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                
                <td>
                    <input type="checkbox" name="checkbox23" id="checkbox23" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeeupdate` FROM `rolemasterinfo` WHERE `employeeupdate` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeeupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox23'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox24" id="checkbox24" value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeedelete` FROM `rolemasterinfo` WHERE `employeedelete` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeedelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox24'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox25" id="checkbox25" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `roles` FROM `rolemasterinfo` WHERE `roles` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['roles'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           } 
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox25'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
              
                <td>
                    <input type="checkbox" name="checkbox26" id="checkbox26" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorylist` FROM `rolemasterinfo` WHERE `inventorylist` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorylist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox26'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox27" id="checkbox27" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorycreation` FROM `rolemasterinfo` WHERE `inventorycreation` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorycreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox27'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
               
                <td>
                    <input type="checkbox" name="checkbox28" id="checkbox28" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `requestlist` FROM `rolemasterinfo` WHERE `requestlist` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox28'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox29" id="checkbox29" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `requestcreation` FROM `rolemasterinfo` WHERE `requestcreation` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox29'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox20" id="checkbox20" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `report` FROM `rolemasterinfo` WHERE `report` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['report'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox20'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
         
                <td>
                    <input type="checkbox" name="checkbox211" id="checkbox211" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `approvalrejectedstatus` FROM `rolemasterinfo` WHERE `approvalrejectedstatus` = 1 AND  `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['approvalrejectedstatus'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox211'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox212" id="checkbox212" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectlist` FROM `rolemasterinfo` WHERE `projectlist` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox212'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox213" id="checkbox213" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectcreation` FROM `rolemasterinfo` WHERE `projectcreation` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox213'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox214" id="checkbox214" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectupdate` FROM `rolemasterinfo` WHERE `projectupdate` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox214'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox215" id="checkbox215" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectdelete` FROM `rolemasterinfo` WHERE `projectdelete` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectdelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox215'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox216" id="checkbox216" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorydispatch` FROM `rolemasterinfo` WHERE `inventorydispatch` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorydispatch'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox216'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox217" id="checkbox217" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorytracking` FROM `rolemasterinfo` WHERE `inventorytracking` = 1 AND `roleid` = 0002";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorytracking'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox217'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                               
                
            </tr>
            <tr>
                <td>Admin</td>
                <td>
                    <input type="checkbox" name="checkbox31" id="checkbox31" value="1"  
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `employeelist` FROM `rolemasterinfo` WHERE `employeelist` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeelist'] == 1){
                                                    echo 'checked="checked"';
                                                
                                                }
                                            }
                                           }
                                           ?>
                                           <?php
                                            if(isset($_POST['checkbox31'])) {
                                             echo 'checked="checked"';
                                        } 
                                        ?> >
                                           
                </td>
                <td>
                    <input type="checkbox" name="checkbox32" id="checkbox32"  value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeecreation` FROM `rolemasterinfo` WHERE `employeecreation` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeecreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox32'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                
                <td>
                    <input type="checkbox" name="checkbox33" id="checkbox33" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeeupdate` FROM `rolemasterinfo` WHERE `employeeupdate` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeeupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox33'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox34" id="checkbox34" value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeedelete` FROM `rolemasterinfo` WHERE `employeedelete` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeedelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox34'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox35" id="checkbox35" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `roles` FROM `rolemasterinfo` WHERE `roles` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['roles'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           } 
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox35'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
              
                <td>
                    <input type="checkbox" name="checkbox36" id="checkbox36" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorylist` FROM `rolemasterinfo` WHERE `inventorylist` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorylist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox36'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox37" id="checkbox37" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorycreation` FROM `rolemasterinfo` WHERE `inventorycreation` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorycreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox37'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
               
                <td>
                    <input type="checkbox" name="checkbox38" id="checkbox38" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `requestlist` FROM `rolemasterinfo` WHERE `requestlist` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox38'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox39" id="checkbox39" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `requestcreation` FROM `rolemasterinfo` WHERE `requestcreation` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox39'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox30" id="checkbox30" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `report` FROM `rolemasterinfo` WHERE `report` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['report'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox30'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
         
                <td>
                    <input type="checkbox" name="checkbox311" id="checkbox311" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `approvalrejectedstatus` FROM `rolemasterinfo` WHERE `approvalrejectedstatus` = 1 AND  `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['approvalrejectedstatus'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox311'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox312" id="checkbox312" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectlist` FROM `rolemasterinfo` WHERE `projectlist` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox312'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox313" id="checkbox313" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectcreation` FROM `rolemasterinfo` WHERE `projectcreation` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox313'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox314" id="checkbox314" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectupdate` FROM `rolemasterinfo` WHERE `projectupdate` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox314'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox315" id="checkbox315" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectdelete` FROM `rolemasterinfo` WHERE `projectdelete` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectdelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox315'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox316" id="checkbox316" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorydispatch` FROM `rolemasterinfo` WHERE `inventorydispatch` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorydispatch'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox316'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox317" id="checkbox317" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorytracking` FROM `rolemasterinfo` WHERE `inventorytracking` = 1 AND `roleid` = 0003";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorytracking'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox317'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                
                
            </tr>
            <tr>
                <td>Finance</td>
                <td>
                    <input type="checkbox" name="checkbox41" id="checkbox41" value="1"  
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `employeelist` FROM `rolemasterinfo` WHERE `employeelist` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeelist'] == 1){
                                                    echo 'checked="checked"';
                                                
                                                }
                                            }
                                           }
                                           ?>
                                           <?php
                                            if(isset($_POST['checkbox41'])) {
                                             echo 'checked="checked"';
                                        } 
                                        ?> >
                                           
                </td>
                <td>
                    <input type="checkbox" name="checkbox42" id="checkbox42"  value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeecreation` FROM `rolemasterinfo` WHERE `employeecreation` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeecreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox42'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                
                <td>
                    <input type="checkbox" name="checkbox43" id="checkbox43" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeeupdate` FROM `rolemasterinfo` WHERE `employeeupdate` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeeupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox43'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox44" id="checkbox44" value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeedelete` FROM `rolemasterinfo` WHERE `employeedelete` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeedelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox44'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox45" id="checkbox45" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `roles` FROM `rolemasterinfo` WHERE `roles` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['roles'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           } 
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox45'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
              
                <td>
                    <input type="checkbox" name="checkbox46" id="checkbox46" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorylist` FROM `rolemasterinfo` WHERE `inventorylist` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorylist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox46'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox47" id="checkbox47" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorycreation` FROM `rolemasterinfo` WHERE `inventorycreation` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorycreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox47'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
               
                <td>
                    <input type="checkbox" name="checkbox48" id="checkbox48" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `requestlist` FROM `rolemasterinfo` WHERE `requestlist` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox48'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox49" id="checkbox49" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `requestcreation` FROM `rolemasterinfo` WHERE `requestcreation` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox49'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox40" id="checkbox40" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `report` FROM `rolemasterinfo` WHERE `report` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['report'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox40'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
         
                <td>
                    <input type="checkbox" name="checkbox411" id="checkbox411" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `approvalrejectedstatus` FROM `rolemasterinfo` WHERE `approvalrejectedstatus` = 1 AND  `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['approvalrejectedstatus'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox411'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox412" id="checkbox412" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectlist` FROM `rolemasterinfo` WHERE `projectlist` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox412'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox413" id="checkbox413" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectcreation` FROM `rolemasterinfo` WHERE `projectcreation` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox413'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox414" id="checkbox414" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectupdate` FROM `rolemasterinfo` WHERE `projectupdate` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox414'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox415" id="checkbox415" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectdelete` FROM `rolemasterinfo` WHERE `projectdelete` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectdelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox415'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox416" id="checkbox416" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorydispatch` FROM `rolemasterinfo` WHERE `inventorydispatch` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorydispatch'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox416'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox417" id="checkbox417" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorytracking` FROM `rolemasterinfo` WHERE `inventorytracking` = 1 AND `roleid` = 0004";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorytracking'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox417'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                       
            </tr>
            <tr>
                <td>Executive</td>
                <td>
                    <input type="checkbox" name="checkbox51" id="checkbox51" value="1"  
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `employeelist` FROM `rolemasterinfo` WHERE `employeelist` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeelist'] == 1){
                                                    echo 'checked="checked"';
                                                
                                                }
                                            }
                                           }
                                           ?>
                                           <?php
                                            if(isset($_POST['checkbox51'])) {
                                             echo 'checked="checked"';
                                        } 
                                        ?> >
                                           
                </td>
                <td>
                    <input type="checkbox" name="checkbox52" id="checkbox52"  value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeecreation` FROM `rolemasterinfo` WHERE `employeecreation` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeecreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox52'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                
                <td>
                    <input type="checkbox" name="checkbox53" id="checkbox53" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeeupdate` FROM `rolemasterinfo` WHERE `employeeupdate` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeeupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox53'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox54" id="checkbox54" value="1" 
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `employeedelete` FROM `rolemasterinfo` WHERE `employeedelete` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['employeedelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox54'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox55" id="checkbox55" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `roles` FROM `rolemasterinfo` WHERE `roles` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['roles'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           } 
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox55'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
              
                <td>
                    <input type="checkbox" name="checkbox56" id="checkbox56" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorylist` FROM `rolemasterinfo` WHERE `inventorylist` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorylist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox56'])) {
                                            echo 'checked="checked"';
                                        } 
                                        ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox57" id="checkbox57" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorycreation` FROM `rolemasterinfo` WHERE `inventorycreation` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorycreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox57'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
               
                <td>
                    <input type="checkbox" name="checkbox58" id="checkbox58" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `requestlist` FROM `rolemasterinfo` WHERE `requestlist` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox58'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox59" id="checkbox59" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `requestcreation` FROM `rolemasterinfo` WHERE `requestcreation` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['requestcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox59'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox50" id="checkbox50" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                          
                                           <?php
                                           $sql = "SELECT `report` FROM `rolemasterinfo` WHERE `report` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['report'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox50'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
         
                <td>
                    <input type="checkbox" name="checkbox511" id="checkbox511" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `approvalrejectedstatus` FROM `rolemasterinfo` WHERE `approvalrejectedstatus` = 1 AND  `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['approvalrejectedstatus'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox511'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox512" id="checkbox512" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectlist` FROM `rolemasterinfo` WHERE `projectlist` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectlist'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox512'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox513" id="checkbox513" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectcreation` FROM `rolemasterinfo` WHERE `projectcreation` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectcreation'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox513'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox514" id="checkbox514" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectupdate` FROM `rolemasterinfo` WHERE `projectupdate` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectupdate'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox514'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox515" id="checkbox515" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `projectdelete` FROM `rolemasterinfo` WHERE `projectdelete` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['projectdelete'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox515'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox516" id="checkbox516" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorydispatch` FROM `rolemasterinfo` WHERE `inventorydispatch` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorydispatch'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox516'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox517" id="checkbox517" value="1"
                                           onchange= "document.getElementById('form').submit();"
                                           
                                           <?php
                                           $sql = "SELECT `inventorytracking` FROM `rolemasterinfo` WHERE `inventorytracking` = 1 AND `roleid` = 0005";
                                           $result = mysqli_query($conn,$sql);
                                           if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                if($row['inventorytracking'] == 1){
                                                    echo 'checked="checked"';
                                                }
                                            }
                                           }
                                           ?>
                                           <?php 
                                           if(isset($_POST['checkbox517'])){
                                            echo 'checked="checked"';
                                           }
                                           ?> >
                </td>
                
            </tr>
            <tr>
                <td colspan="18">
                    <input type="submit" name="submit" id="">
                </td>
            </tr>
        </table>
    </form> 
    <?php
    include "config.php";
    if(isset($_POST['submit'])){
        if(isset($_POST['checkbox11'])){
            $sql11 = "UPDATE `rolemasterinfo` SET `employeelist` = 1 WHERE  `roleid` = 0001 ";
            
        }
        else{
            $sql11 = "UPDATE `rolemasterinfo` SET  `employeelist` = 0 WHERE `roleid` = 0001 ";
        }
        $firstresult = $conn->query($sql11);
        if(isset($_POST['checkbox12'])){
            $sql12 = "UPDATE `rolemasterinfo` SET `employeecreation` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql12 = "UPDATE `rolemasterinfo` SET `employeecreation` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql12);
        

        if(isset($_POST['checkbox13'])){
            $sql13 = "UPDATE `rolemasterinfo` SET `employeeupdate` = 1 WHERE  `roleid` = 0001 ";

        }
        else{
            $sql13 = "UPDATE `rolemasterinfo` SET  `employeeupdate` = 0 WHERE `roleid` = 0001 ";
        }
        $firstresult = $conn->query($sql13);
        if(isset($_POST['checkbox14'])){
            $sql14 = "UPDATE `rolemasterinfo` SET `employeedelete` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql14 = "UPDATE `rolemasterinfo` SET `employeedelete` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql14);
        if(isset($_POST['checkbox15'])){
            $sql15 = "UPDATE `rolemasterinfo` SET `roles` = 1 WHERE  `roleid` = 0001 ";

        }
        else{
            $sql15 = "UPDATE `rolemasterinfo` SET  `roles` = 0 WHERE `roleid` = 0001 ";
        }
        $firstresult = $conn->query($sql15);
        if(isset($_POST['checkbox16'])){
            $sql16 = "UPDATE `rolemasterinfo` SET `inventorylist` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql16 = "UPDATE `rolemasterinfo` SET `inventorylist` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql16);
        if(isset($_POST['checkbox17'])){
            $sql17 = "UPDATE `rolemasterinfo` SET `inventorycreation` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql17 = "UPDATE `rolemasterinfo` SET `inventorycreation` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql17);
        if(isset($_POST['checkbox18'])){
            $sql18 = "UPDATE `rolemasterinfo` SET `requestlist` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql18 = "UPDATE `rolemasterinfo` SET `requestlist` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql18);
        if(isset($_POST['checkbox19'])){
            $sql19 = "UPDATE `rolemasterinfo` SET `requestcreation` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql19 = "UPDATE `rolemasterinfo` SET `requestcreation` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql19);
        if(isset($_POST['checkbox10'])){
            $sql10 = "UPDATE `rolemasterinfo` SET `report` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql10 = "UPDATE `rolemasterinfo` SET `report` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql10);
        if(isset($_POST['checkbox111'])){
            $sql111 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql111 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql111);
        if(isset($_POST['checkbox112'])){
            $sql112 = "UPDATE `rolemasterinfo` SET `projectlist` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql112 = "UPDATE `rolemasterinfo` SET `projectlist` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql112);

        if(isset($_POST['checkbox113'])){
            $sql113 = "UPDATE `rolemasterinfo` SET `projectcreation` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql113 = "UPDATE `rolemasterinfo` SET `projectcreation` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql113);

        if(isset($_POST['checkbox114'])){
            $sql114 = "UPDATE `rolemasterinfo` SET `projectupdate` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql114 = "UPDATE `rolemasterinfo` SET `projectupdate` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql114);

        if(isset($_POST['checkbox115'])){
            $sql115 = "UPDATE `rolemasterinfo` SET `projectdelete` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql115 = "UPDATE `rolemasterinfo` SET `projectdelete` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql115);

        if(isset($_POST['checkbox116'])){
            $sql116 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql116 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql116);
        if(isset($_POST['checkbox117'])){
            $sql117 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql117 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql117);



        if(isset($_POST['checkbox21'])){
            $sql21 = "UPDATE `rolemasterinfo` SET `employeelist` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql21 = "UPDATE `rolemasterinfo` SET `employeelist`= 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql21);
        if(isset($_POST['checkbox22'])){
            $sql22 = "UPDATE `rolemasterinfo` SET `employeecreation` = 1 WHERE `roleid`= 0002";
        }
        else{
            $sql22 = "UPDATE `rolemasterinfo` SET `employeecreation` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql22);
        if(isset($_POST['checkbox23'])){
            $sql23 = "UPDATE `rolemasterinfo` SET `employeeupdate` = 1   WHERE `roleid` = 0002";
        }
        else{
            $sql23 = "UPDATE `rolemasterinfo` SET `employeeupdate` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql23);
        if(isset($_POST['checkbox24'])){
            $sql24 = "UPDATE `rolemasterinfo` SET `employeedelete` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql24 = "UPDATE `rolemasterinfo` SET `employeedelete` = 0 WHERE `roleid`= 0002";
        }
        $secondresult = $conn->query($sql24);
        if(isset($_POST['checkbox25'])){
            $sql25 = "UPDATE `rolemasterinfo` SET `roles` = 1 WHERE `roleid`= 0002";
        }
        else{
            $sql25 = "UPDATE `rolemasterinfo` SET `roles` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql25);
        if(isset($_POST['checkbox26'])){
            $sql26 = "UPDATE `rolemasterinfo` SET `inventorylist` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql26 = "UPDATE `rolemasterinfo` SET `inventorylist` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql26);

        if(isset($_POST['checkbox27'])){
            $sql27 = "UPDATE `rolemasterinfo` SET `inventorycreation` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql27 = "UPDATE `rolemasterinfo` SET `inventorycreation`= 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql27);
        if(isset($_POST['checkbox28'])){
            $sql28 = "UPDATE `rolemasterinfo` SET `requestlist` = 1 WHERE `roleid`= 0002";
        }
        else{
            $sql28 = "UPDATE `rolemasterinfo` SET `requestlist` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql28);
        if(isset($_POST['checkbox29'])){
            $sql29 = "UPDATE `rolemasterinfo` SET `requestcreation` = 1   WHERE `roleid` = 0002";
        }
        else{
            $sql29 = "UPDATE `rolemasterinfo` SET `requestcreation` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql29);
        if(isset($_POST['checkbox20'])){
            $sql20 = "UPDATE `rolemasterinfo` SET `report` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql20 = "UPDATE `rolemasterinfo` SET `report` = 0 WHERE `roleid`= 0002";
        }
        $secondresult = $conn->query($sql20);
        if(isset($_POST['checkbox211'])){
            $sql211 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 1 WHERE `roleid`= 0002";
        }
        else{
            $sql211 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql211);
        if(isset($_POST['checkbox212'])){
            $sql212 = "UPDATE `rolemasterinfo` SET `projectlist` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql212 = "UPDATE `rolemasterinfo` SET `projectlist` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql212);
        if(isset($_POST['checkbox213'])){
            $sql213 = "UPDATE `rolemasterinfo` SET `projectcreation` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql213 = "UPDATE `rolemasterinfo` SET `projectcreation` = 0 WHERE `roleid` = 0002";
        }
        $firstresult = $conn->query($sql213);

        if(isset($_POST['checkbox214'])){
            $sql214 = "UPDATE `rolemasterinfo` SET `projectupdate` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql214 = "UPDATE `rolemasterinfo` SET `projectupdate` = 0 WHERE `roleid` = 0002";
        }
        $firstresult = $conn->query($sql214);

        if(isset($_POST['checkbox215'])){
            $sql215 = "UPDATE `rolemasterinfo` SET `projectdelete` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql215 = "UPDATE `rolemasterinfo` SET `projectdelete` = 0 WHERE `roleid` = 0002";
        }
        $firstresult = $conn->query($sql215);

        if(isset($_POST['checkbox216'])){
            $sql216 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql216 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 0 WHERE `roleid` = 0002";
        }
        $firstresult = $conn->query($sql216);
        if(isset($_POST['checkbox217'])){
            $sql217 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql217 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 0 WHERE `roleid` = 0002";
        }
        $firstresult = $conn->query($sql217);


        if(isset($_POST['checkbox31'])){
            $sql31 = "UPDATE `rolemasterinfo` SET `employeelist` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql31 = "UPDATE `rolemasterinfo` SET  `employeelist` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql31);
        if(isset($_POST['checkbox32'])){
            $sql32 = "UPDATE `rolemasterinfo` SET `employeecreation` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql32 = "UPDATE `rolemasterinfo` SET `employeecreation` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql32);
        if(isset($_POST['checkbox33'])){
            $sql33 = "UPDATE `rolemasterinfo` SET `employeeupdate` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql33 = "UPDATE `rolemasterinfo` SET  `employeeupdate` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql33);
        if(isset($_POST['checkbox34'])){
            $sql34 = "UPDATE `rolemasterinfo` SET `employeedelete` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql34 = "UPDATE `rolemasterinfo` SET `employeedelete` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql34);
        if(isset($_POST['checkbox35'])){
            $sql35 = "UPDATE `rolemasterinfo` SET `roles` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql35 = "UPDATE `rolemasterinfo` SET  `roles` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql35);
        if(isset($_POST['checkbox36'])){
            $sql36 = "UPDATE `rolemasterinfo` SET `inventorylist` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql36 = "UPDATE `rolemasterinfo` SET `inventorylist` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql36);

        if(isset($_POST['checkbox37'])){
            $sql37 = "UPDATE `rolemasterinfo` SET `inventorycreation` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql37 = "UPDATE `rolemasterinfo` SET  `inventorycreation` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql37);
        if(isset($_POST['checkbox38'])){
            $sql38 = "UPDATE `rolemasterinfo` SET `requestlist` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql38 = "UPDATE `rolemasterinfo` SET `requestlist` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql38);
        if(isset($_POST['checkbox39'])){
            $sql39 = "UPDATE `rolemasterinfo` SET `requestcreation` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql39 = "UPDATE `rolemasterinfo` SET  `requestcreation` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql39);
        if(isset($_POST['checkbox30'])){
            $sql30 = "UPDATE `rolemasterinfo` SET `report` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql30 = "UPDATE `rolemasterinfo` SET `report` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql30);
        if(isset($_POST['checkbox311'])){
            $sql311 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql311 = "UPDATE `rolemasterinfo` SET  `approvalrejectedstatus` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql311);
        if(isset($_POST['checkbox312'])){
            $sql312 = "UPDATE `rolemasterinfo` SET `projectlist` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql312 = "UPDATE `rolemasterinfo` SET `projectlist` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql312);
        if(isset($_POST['checkbox313'])){
            $sql313 = "UPDATE `rolemasterinfo` SET `projectcreation` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql313 = "UPDATE `rolemasterinfo` SET `projectcreation` = 0 WHERE `roleid` = 0003";
        }
        $firstresult = $conn->query($sql313);

        if(isset($_POST['checkbox314'])){
            $sql314 = "UPDATE `rolemasterinfo` SET `projectupdate` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql314 = "UPDATE `rolemasterinfo` SET `projectupdate` = 0 WHERE `roleid` = 0003";
        }
        $firstresult = $conn->query($sql314);

        if(isset($_POST['checkbox315'])){
            $sql315 = "UPDATE `rolemasterinfo` SET `projectdelete` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql315 = "UPDATE `rolemasterinfo` SET `projectdelete` = 0 WHERE `roleid` = 0003";
        }
        $firstresult = $conn->query($sql315);

        if(isset($_POST['checkbox316'])){
            $sql316 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql316 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 0 WHERE `roleid` = 0003";
        }
        $firstresult = $conn->query($sql316);
        if(isset($_POST['checkbox317'])){
            $sql317 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql317 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 0 WHERE `roleid` = 0003";
        }
        $firstresult = $conn->query($sql317);



        if(isset($_POST['checkbox41'])){
            $sql41 = "UPDATE `rolemasterinfo` SET `employeelist` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql41 = "UPDATE `rolemasterinfo` SET `employeelist`= 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql41);
        if(isset($_POST['checkbox42'])){
            $sql42 = "UPDATE `rolemasterinfo` SET `employeecreation` = 1 WHERE `roleid`= 0004";
        }
        else{
            $sql42 = "UPDATE `rolemasterinfo` SET `employeecreation` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql42);
        if(isset($_POST['checkbox43'])){
            $sql43 = "UPDATE `rolemasterinfo` SET `employeeupdate` = 1   WHERE `roleid` = 0004";
        }
        else{
            $sql43 = "UPDATE `rolemasterinfo` SET `employeeupdate` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql43);
        if(isset($_POST['checkbox44'])){
            $sql44 = "UPDATE `rolemasterinfo` SET `employeedelete` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql44 = "UPDATE `rolemasterinfo` SET `employeedelete` = 0 WHERE `roleid`= 0004";
        }
        $fourthresult = $conn->query($sql44);
        if(isset($_POST['checkbox45'])){
            $sql45 = "UPDATE `rolemasterinfo` SET `roles` = 1 WHERE `roleid`= 0004";
        }
        else{
            $sql45 = "UPDATE `rolemasterinfo` SET `roles` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql45);
        if(isset($_POST['checkbox46'])){
            $sql46 = "UPDATE `rolemasterinfo` SET `inventorylist` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql46 = "UPDATE `rolemasterinfo` SET `inventorylist` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql46);

        if(isset($_POST['checkbox47'])){
            $sql47 = "UPDATE `rolemasterinfo` SET `inventorycreation` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql47 = "UPDATE `rolemasterinfo` SET `inventorycreation`= 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql47);
        if(isset($_POST['checkbox48'])){
            $sql48 = "UPDATE `rolemasterinfo` SET `requestlist` = 1 WHERE `roleid`= 0004";
        }
        else{
            $sql48 = "UPDATE `rolemasterinfo` SET `requestlist` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql48);
        if(isset($_POST['checkbox49'])){
            $sql49 = "UPDATE `rolemasterinfo` SET `requestcreation` = 1   WHERE `roleid` = 0004";
        }
        else{
            $sql49 = "UPDATE `rolemasterinfo` SET `requestcreation` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql49);
        if(isset($_POST['checkbox40'])){
            $sql40 = "UPDATE `rolemasterinfo` SET `report` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql40 = "UPDATE `rolemasterinfo` SET `report` = 0 WHERE `roleid`= 0004";
        }
        $fourthresult = $conn->query($sql40);
        if(isset($_POST['checkbox411'])){
            $sql411 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 1 WHERE `roleid`= 0004";
        }
        else{
            $sql411 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql411);
        if(isset($_POST['checkbox412'])){
            $sql412 = "UPDATE `rolemasterinfo` SET `projectlist` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql412 = "UPDATE `rolemasterinfo` SET `projectlist` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql412);

        if(isset($_POST['checkbox413'])){
            $sql413 = "UPDATE `rolemasterinfo` SET `projectcreation` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql413 = "UPDATE `rolemasterinfo` SET `projectcreation` = 0 WHERE `roleid` = 0004";
        }
        $firstresult = $conn->query($sql413);

        if(isset($_POST['checkbox414'])){
            $sql414 = "UPDATE `rolemasterinfo` SET `projectupdate` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql414 = "UPDATE `rolemasterinfo` SET `projectupdate` = 0 WHERE `roleid` = 0004";
        }
        $firstresult = $conn->query($sql414);

        if(isset($_POST['checkbox415'])){
            $sql415 = "UPDATE `rolemasterinfo` SET `projectdelete` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql415 = "UPDATE `rolemasterinfo` SET `projectdelete` = 0 WHERE `roleid` = 0004";
        }
        $firstresult = $conn->query($sql415);

        if(isset($_POST['checkbox416'])){
            $sql416 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql416 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 0 WHERE `roleid` = 0004";
        }
        $firstresult = $conn->query($sql416);
        if(isset($_POST['checkbox417'])){
            $sql417 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql417 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 0 WHERE `roleid` = 0004";
        }
        $firstresult = $conn->query($sql417);


        if(isset($_POST['checkbox51'])){
            $sql51 = "UPDATE `rolemasterinfo` SET `employeelist` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql51 = "UPDATE `rolemasterinfo` SET  `employeelist` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql51);
        if(isset($_POST['checkbox52'])){
            $sql52 = "UPDATE `rolemasterinfo` SET `employeecreation` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql52 = "UPDATE `rolemasterinfo` SET `employeecreation` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql52);
        if(isset($_POST['checkbox53'])){
            $sql53 = "UPDATE `rolemasterinfo` SET `employeeupdate` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql53 = "UPDATE `rolemasterinfo` SET  `employeeupdate` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql53);
        if(isset($_POST['checkbox54'])){
            $sql54 = "UPDATE `rolemasterinfo` SET `employeedelete` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql54 = "UPDATE `rolemasterinfo` SET `employeedelete` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql54);
        if(isset($_POST['checkbox55'])){
            $sql55 = "UPDATE `rolemasterinfo` SET `roles` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql55 = "UPDATE `rolemasterinfo` SET  `roles` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql55);
        if(isset($_POST['checkbox56'])){
            $sql56 = "UPDATE `rolemasterinfo` SET `inventorylist` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql56 = "UPDATE `rolemasterinfo` SET `inventorylist` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql56);

        if(isset($_POST['checkbox57'])){
            $sql57 = "UPDATE `rolemasterinfo` SET `inventorycreation` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql57 = "UPDATE `rolemasterinfo` SET  `inventorycreation` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql57);
        if(isset($_POST['checkbox58'])){
            $sql58 = "UPDATE `rolemasterinfo` SET `requestlist` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql58 = "UPDATE `rolemasterinfo` SET `requestlist` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql58);
        if(isset($_POST['checkbox59'])){
            $sql59 = "UPDATE `rolemasterinfo` SET `requestcreation` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql59 = "UPDATE `rolemasterinfo` SET  `requestcreation` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql59);
        if(isset($_POST['checkbox50'])){
            $sql50 = "UPDATE `rolemasterinfo` SET `report` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql50 = "UPDATE `rolemasterinfo` SET `report` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql50);
        if(isset($_POST['checkbox511'])){
            $sql511 = "UPDATE `rolemasterinfo` SET `approvalrejectedstatus` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql511 = "UPDATE `rolemasterinfo` SET  `approvalrejectedstatus` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql511);
        if(isset($_POST['checkbox512'])){
            $sql512 = "UPDATE `rolemasterinfo` SET `projectlist` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql512 = "UPDATE `rolemasterinfo` SET `projectlist` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql512);
        if(isset($_POST['checkbox513'])){
            $sql513 = "UPDATE `rolemasterinfo` SET `projectcreation` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql513 = "UPDATE `rolemasterinfo` SET `projectcreation` = 0 WHERE `roleid` = 0005";
        }
        $firstresult = $conn->query($sql513);

        if(isset($_POST['checkbox514'])){
            $sql514 = "UPDATE `rolemasterinfo` SET `projectupdate` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql514 = "UPDATE `rolemasterinfo` SET `projectupdate` = 0 WHERE `roleid` = 0005";
        }
        $firstresult = $conn->query($sql514);

        if(isset($_POST['checkbox515'])){
            $sql515 = "UPDATE `rolemasterinfo` SET `projectdelete` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql515 = "UPDATE `rolemasterinfo` SET `projectdelete` = 0 WHERE `roleid` = 0005";
        }

        $firstresult = $conn->query($sql515);

        if(isset($_POST['checkbox516'])){
            $sql516 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql516 = "UPDATE `rolemasterinfo` SET `inventorydispatch` = 0 WHERE `roleid` = 0005";
        }
        $firstresult = $conn->query($sql516);
        if(isset($_POST['checkbox517'])){
            $sql517 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql517 = "UPDATE `rolemasterinfo` SET `inventorytracking` = 0 WHERE `roleid` = 0005";
        }
        $firstresult = $conn->query($sql517);



       echo "data updated successfully ";
    }

?>

<a href="task1.php" style= "font-size: 25px;
    border: 2px solid blue;
    border-radius: 10px;
    padding: 10px;
    position:relative;
    top:30px;
    left:30px;">Back</a>

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