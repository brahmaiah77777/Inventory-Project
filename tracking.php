
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="task1.css">
    <link rel="stylesheet" href="inventory.css">
    <style>
       
        select{
            font-size:20px;
        }
        table{
            margin-bottom:20px;
        }
    </style>
</head>
<body>
<input type="checkbox" id="nav-toggle">
    
    <div class="sidebar">
            <div class="sidebar-brand">
               
                <span id="kleenpulse"><img src="ermimage.png" alt=""></span>
            </h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    
                    <li>
                       
                            <a href="task1.php">Dashboard</a>
                       
                    </li>
                    <li>
                        
                            <a href="empcreation.php" >Employee Creation</a>
                        
                    </li>
                    <li>
                        
                            <a href="rolespage.php">Roles</a>
                        
                    </li>
                    <li>
                       
                            <a href="newinventory.php">Inventory</a>
                        
                    </li>
                    <li>
                        
                            <a href="request.php">Requests</a>
                        
                    </li>
                    <li>
                        
                            <a href="report.php">Reports</a>
                       
                    </li>
                    <li>
                        
                            <a href="status.php">Approval Rejected Status</a>
                       
                    </li>
                    <li>
                        <a href="projectdetails.php">Projectdetails</a>
                    </li>
                    <li>
                        <a href="dropdown2.php"> Inventory Tracking</a>
                    </li>
                </ul>
            </div>
    </div>
    <div class="main-wrapper">
    <div class="main-content" style="background:white;">
            <header>
                <h2 class="heading" id="dashboard">
                    Dashboard
                    </h2>

                <div class="user-wrapper">
                    <img src="https://assets.codepen.io/3853433/internal/avatars/users/default.png?format=auto&version=1617122449&width=40&height=40"
                        alt="">
                    <div>
                        <h4>User</h4>
                        
                    </div>
                </div>
            </header>
           
             <main style="margin-top:0px;">
             <center>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"  method= "POST">

    <table>
        <tbody>
            <tr>
                <td>Projectname : </td>
                <td>
                    <select name="projectname" id="">
                        <option value="select">select</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Maharastra">Maharastra</option>
                        <option value="Delhi">Delhi</option>
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
</form>
    </center>


    <table >
        <thead>
            <th>Projectname</th>
            <th>From date</th>
            <th>To date</th>
            <th>Status</th>
            <th>Location</th>
        </thead>
        <tbody>
            <?php
            include "config.php";
           
            $sql = "SELECT * FROM `project_details` ";
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $projectname = $row['Projectname'];
                    $fromdate = $row['Projectfromdate'];
                    $todate = $row['Projecttodate'];
                    $status = $row['Projectstatus'];

                    echo '<tr>
                    <td>'.$projectname.'</td>
                    <td>'.$fromdate.'</td>
                    <td>'.$todate.'</td>
                    <td>'.$status.'</td>
                    </tr>
                    ';
                 }} 
            
            ?>
        </tbody>
    </table>
    
    <table >
        <thead>
            <!-- <th>Projectname</th>
            <th>From date</th>
            <th>To date</th>
            <th>Status</th>
            <th>Location</th> 
        </thead>
        <tbody>
            <?php
            include "config.php";
            if(isset($_POST['submit'])){

            if(($_POST['projectname'] == 'mumbai')){
            $sql = "SELECT * FROM `project_details` WHERE `Projectname` = 'mumbai'";
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $projectname = $row['Projectname'];
                    $fromdate = $row['Projectfromdate'];
                    $todate = $row['Projecttodate'];
                    $status = $row['Projectstatus'];

                    echo '<tr>
                    <td>'.$projectname.'</td>
                    <td>'.$fromdate.'</td>
                    <td>'.$todate.'</td>
                    <td>'.$status.'</td>
                    </tr>
                    ';
                 }} }
                else  if(($_POST['projectname'] == 'Delhi')){
                    $sql = "SELECT * FROM `project_details`   WHERE `Projectname` = 'Delhi' ";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $projectname = $row['Projectname'];
                            $fromdate = $row['Projectfromdate'];
                            $todate = $row['Projecttodate'];
                            $status = $row['Projectstatus'];
        
                            echo '<tr>
                            <td>'.$projectname.'</td>
                            <td>'.$fromdate.'</td>
                            <td>'.$todate.'</td>
                            <td>'.$status.'</td>
                            </tr>
                            ';
                         }} }
                        else if(($_POST['projectname'] == 'Maharastra')){
                            $sql = "SELECT * FROM `project_details` WHERE `Projectname` = 'Maharastra' ";
                            $result = mysqli_query($conn,$sql);
                            if($result){
                                while($row = mysqli_fetch_assoc($result)){
                                    $projectname = $row['Projectname'];
                                    $fromdate = $row['Projectfromdate'];
                                    $todate = $row['Projecttodate'];
                                    $status = $row['Projectstatus'];
                
                                    echo '<tr>
                                    <td>'.$projectname.'</td>
                                    <td>'.$fromdate.'</td>
                                    <td>'.$todate.'</td>
                                    <td>'.$status.'</td>
                                    </tr>
                                    ';
                                 }} }
            }
            ?>
        </tbody>
    </table>
        -->
    
   

                
</main> 

</body>
</html>

