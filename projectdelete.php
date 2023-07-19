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
$separateQuery = "SELECT `projectdelete` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
  if($separateRow['projectdelete'] == 1){

  

?>
<?php

  include "config.php";
  if(isset($_GET['deleteid'])){
    $Projectid = $_GET['deleteid'];
    
    $sql = "DELETE FROM `project_details` WHERE `Projectid` = '$Projectid' ";
    $result = mysqli_query($conn,$sql);

    if($result){
        
        header('location:projectdetails.php');
    }
    else{
        die(mysqli_error($conn));
    }
  }
?>
<?php
  }
  else{
    ?>
    <script>
      alert("NO Access For This User");
      window.history.go(-1);
    </script>
    <?php
  }
}
?>