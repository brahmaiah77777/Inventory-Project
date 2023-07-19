<?php

  include "config.php";
  if(isset($_GET['deletecode'])){
    $itemcodeid = $_GET['deletecode'];
    $selectQuery = "SELECT `Itemcode` FROM `inventory_itemvise_details` WHERE `subitemid` = '$itemcodeid'";
    $selectResult = mysqli_query($conn,$selectQuery);
    while($selectRow = mysqli_fetch_assoc($selectResult)){
      $selectId = $selectRow['Itemcode'];
      
    $updateQuery = "UPDATE `inventory_total_count_details` SET 
                  `Totalcount` = `Totalcount` - 1 ,
                   `Itempendingcount` = `Itempendingcount` - 1 
                   WHERE `Itemid` = '$selectId'";

    $updateResult = mysqli_query($conn,$updateQuery);
    if($updateResult){
      echo "data updated";
    }
  }
    $sql = "DELETE FROM `inventory_itemvise_details` WHERE `subitemid` = '$itemcodeid' ";
    $result = mysqli_query($conn,$sql);

    if($result){
        
       
        header('location:newinventory.php');
    }
  }
    else{
        die(mysqli_error($conn));
    }
  
?>