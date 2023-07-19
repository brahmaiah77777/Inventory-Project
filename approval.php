
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="inventory.css">
    <style>
        body{
            background:#f1f2f7;
        }
    </style>
</head>
<body>
    <center>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <table>
            <thead>
                <th>Item Name</th>
                <th>Available count</th>
                <th>Request count</th>
                <th>Comments</th>
            </thead>
            <tbody>
                <?php          
                 
                
                include "config.php";
              //  $projectname = $_GET['projectname'];
               // $sql = "SELECT requestid FROM inventory_request_details a WHERE projectdetails=( SELECT projectname FROM project_details b WHERE a.Projectdetails = b.Projectname )";
               $sql = "SELECT
               c.requestid,
               c.approval1remarks,
               c.Itemcode,
               c.Approval2remarks,
               c.Itemcount,
               c.Projectdetails,
               c.Projectid,
               c.Requestedemploy,
               c.Requestedemployremarks,
               c.Status,
               s.Itempendingcount
           FROM
               inventory_request_details AS c
           INNER JOIN inventory_total_count_details AS s
           ON
               s.Itemcode = c.Requestedemploy
           INNER JOIN project_details AS cprs
           ON
               cprs.Projectname = c.Projectdetails  
              
              WHERE cprs.`Projectstatus` = 'Active'";
               
                $result = mysqli_query($conn,$sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                       
                        $itemname =$row['Requestedemploy'];
                        $pendingcount = $row['Itempendingcount'];
                        echo
                        '<tr>
                        <td>'.$itemname.'</td>
                        <td>'.$pendingcount.'</td>
                        <td><input type="number" name="requestcount" required></td>
                        <td><input type="text" name="comments" required><td>
                        </tr>';
                    }
                }
          
                ?>
                <tr>
                    <td colspan="5">
                        <input type="submit" name="approve" id="" value="approve">
                    </td>
                </tr>

            </tbody>
        </table>
    
    </form>
    </center>
</body>
</html>

<?php
 include "config.php";
 
 if(isset($_POST['approve'])){
    $requestcount = $_POST['requestcount'];
    $comments = $_POST['comments'];
    $sql2 = "SELECT * FROM `itemwise_request_details` WHERE `status` = 'Active'";
    $result2  = mysqli_query($conn,$sql2);
    while($row2 = mysqli_fetch_assoc($result2)){
        if($row2['approval1remarks'] == "" && $row2['approval1count'] == ""){
            $sql = "UPDATE `itemwise_request_details` SET 
            `approval1remarks` = '$comments' ,
            `approval1count` = '$requestcount' WHERE `status` = 'Active' ";
   
    
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "data updated";
            }
            else{
                echo "data not updated ";
            }
        }
        else{
            $sql = "UPDATE `itemwise_request_details` SET 
            `approval2remarks` = '$comments' ,
            `approval2count` = '$requestcount' WHERE `status` = 'Active' ";
   
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "data updated";
            }
            else{
                echo "data not updated ";
            }
        }
    }

 }
?>


<!-- 
<form action="create.php" method="POST">
<?php
$query="SELECT * FROM users where class "; // SQL query to fetch all table data
$view_users= mysqli_query($conn,$query);    // sending the query to the database

//  displaying all the data retrieved from the database using while loop
while($row= mysqli_fetch_assoc($view_users)){
$id = $row['id'];  
$marksnamaz = $row['marksnamaz'];
$class = $row['class'];
echo "<tr >";
echo " <th scope='row' >{$id}</th>";
echo " <td >{$marksnamaz}<input name='name' type='hidden' value='{$marksnamaz}'></td>";
echo "<td><select name='att'><option value='Hazir'>Hazir</option><option value='gherhazir'>Gher Hazir</option><option value='rukhsat'>Rukhsat</option></select></td>";
echo "<td><input type='text' name='reason'></td>";
echo "<td>{$class}</td>";
echo "</tr>";
}  
?>
<input type="submit" name="create">
</form> -->
<!-- 
<?php 
  if(isset($_POST['create'])) 
    {
        $name = $_POST['name'];
        $att = $_POST['att'];
        $reason = $_POST['reason'];
        $date = date("y-m-d");
        // SQL query to insert user data into the users table
        $query= "INSERT INTO att(name, att, reason, date) VALUES('{$name}','{$att}','{$reason}','{$date}')";
        $add_user = mysqli_query($conn,$query);
    
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_user) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { 
              }         
    }
?> -->