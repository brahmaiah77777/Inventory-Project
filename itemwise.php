<?php
  
  include "config.php";
  if(isset($_POST['submit'])){
    $projectname = $_POST['projectname'];
    $itemname = $_POST['itemname'];
    $remarks = $_POST['remarks'];
    $bcscount = $_POST['bcscount'];
    $bmdcount = $_POST['bmdcount'];
    $cctvcount = $_POST['cctvcount'];
    $rfidcount = $_POST['rfidcount'];
    $rdacount = $_POST['rdacount'];
    

    $sql1 = "INSERT INTO `itemwise_request_details` VALUES (
      'ESCBCS0001',
      '$projectname',
      '$remarks',
      'esc0001',
      '1',
      '$bcscount')";
    $result1 = mysqli_query($conn,$sql1);
    $sql2 = "INSERT INTO `itemwise_request_details` VALUES (
      'ESCBMD0001',
      '$projectname',
      '$remarks',
      'esc0002',
      '1',
      '$bmdcount')";
    $result2 = mysqli_query($conn,$sql2);
    $sql3 = "INSERT INTO `itemwise_request_details` VALUES (
      'ESCCCTV0001',
      '$projectname',
      '$remarks',
      'esc0003',
      '1',
      '$cctvcount')";
    $result3 = mysqli_query($conn,$sql3);
    $sql4 = "INSERT INTO `itemwise_request_details` VALUES (
      'ESCPDR0001',
      '$projectname',
      '$remarks',
      'esc0004',
      '2',
      '$rfidcount')";
    $result4 = mysqli_query($conn,$sql4);
    $sql5 = "INSERT INTO `itemwise_request_details` VALUES (
      'ESCRDA0001',
      '$projectname',
      '$remarks',
      'esc0005',
      '3',
      '$rdacount')";
    $result5 = mysqli_query($conn,$sql5);


    if($result1 == TRUE || $result2 == TRUE || $result3 == TRUE || $result4 == TRUE || $result5 == TRUE){
      echo "data inserted succesfully .";
    }
    else{
      echo "data not inserted .";
    }
  

   
  }
?>

