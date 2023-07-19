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
$separateQuery = "SELECT `employeedelete` FROM `rolemasterinfo` WHERE `roleid` = '$id'";
$separateResult = mysqli_query($conn,$separateQuery);
while($separateRow = mysqli_fetch_assoc($separateResult)){
  if($separateRow['employeedelete'] == 1){

 
  include "config.php";
  if(isset($_GET['deleteid'])){
    $empid = $_GET['deleteid'];
    
    $sql = "DELETE FROM `employcreation` WHERE `empid` = '$empid' ";
    $result = mysqli_query($conn,$sql);

    if($result){
        ?>
        <script>
          alert("deleted successfully.");
        </script>
        <?php
        header('location:empcreationdisplay.php');
    }
    else{
        die(mysqli_error($conn));
    }
  }
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
?>