<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align:center;
        }
        body{
            background-color:antiquewhite
        }
        tr th {
            background-color: black;
            padding: 10px;
            color:  aliceblue;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        tr td {
            padding: 9px;
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
    </style>
</head>
<body>
            
    <h1>Role Details</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="post"  id="form">
        <table>
            <tr>
                <th>Name</th>
                <th>Employ Creation</th>
                <th>Roles</th>
                <th>Inventory</th>
                <th>Request</th>
                <th>Report</th>
                <th>Status</th>
                
            </tr>
            <tr>
                <td>HR</td>
                <td>
                    <input type="checkbox" name="checkbox11" id="myCheck"  value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox11'])) {echo 'checked="checked"';} ?> >
                                           
                </td>
                <td>
                    <input type="checkbox" name="checkbox12" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox12'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox13" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox13'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox14" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox14'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox15" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox15'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox16" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox16'])) {echo 'checked="checked"';}  ?> >
                </td>
            </tr>
            <tr>
                <td>Developer</td>
                <td>
                    <input type="checkbox" name="checkbox21" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox21'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox22" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox22'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox23" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox23'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox24" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox24'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox25" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox25'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox26" id="" value="1" onchange= "document.getElementByid('form').submit();"
                                           <?php if(isset($_POST['checkbox26'])) {echo 'checked="checked"';}  ?> >
                </td>
            </tr>
            <tr>
                <td>Admin</td>
                <td>
                    <input type="checkbox" name="checkbox31" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox31'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox32" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox32'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox33" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox33'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox34" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox34'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox35" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox35'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox36" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox36'])) {echo 'checked="checked"';}  ?>>
                </td>
            </tr>
            <tr>
                <td>Finance</td>
                <td>
                    <input type="checkbox" name="checkbox41" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox41'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox42" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox42'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox43" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox43'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox44" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox44'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox45" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox45'])) {echo 'checked="checked"';}  ?>>
                </td>
                <td>
                    <input type="checkbox" name="checkbox46" id="" value="1"  onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox46'])) {echo 'checked="checked"';}  ?>>
                </td>
            </tr>
            <tr>
                <td>Chairman</td>
                <td>
                    <input type="checkbox" name="checkbox51" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox51'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox52" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox52'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox53" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox53'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox54" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox54'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox55" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox55'])) {echo 'checked="checked"';}  ?> >
                </td>
                <td>
                    <input type="checkbox" name="checkbox56" id="" value="1" onchange= "document.getElementById('form').submit();"
                                           <?php if(isset($_POST['checkbox56'])) {echo 'checked="checked"';}  ?> > 
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <input type="submit" name="submit" id="">
                </td>
            </tr>
        </table>
    </form>
    <?php
    include "config.php";
    if(isset($_POST['submit'])){
        if(isset($_POST['checkbox11'])){
            $sql11 = "UPDATE `rolemasterdetails` SET `employcreation` = 1 WHERE  `roleid` = 0001 ";
            
        }
        else{
            $sql11 = "UPDATE `rolemasterdetails` SET  `employcreation` = 0 WHERE `roleid` = 0001 ";
        }
        $firstresult = $conn->query($sql11);
        if(isset($_POST['checkbox12'])){
            $sql12 = "UPDATE `rolemasterdetails` SET `roles` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql12 = "UPDATE `rolemasterdetails` SET `roles` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql12);
        if(isset($_POST['checkbox13'])){
            $sql13 = "UPDATE `rolemasterdetails` SET `inventory` = 1 WHERE  `roleid` = 0001 ";

        }
        else{
            $sql13 = "UPDATE `rolemasterdetails` SET  `inventory` = 0 WHERE `roleid` = 0001 ";
        }
        $firstresult = $conn->query($sql13);
        if(isset($_POST['checkbox14'])){
            $sql14 = "UPDATE `rolemasterdetails` SET `request` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql14 = "UPDATE `rolemasterdetails` SET `request` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql14);
        if(isset($_POST['checkbox15'])){
            $sql15 = "UPDATE `rolemasterdetails` SET `report` = 1 WHERE  `roleid` = 0001 ";

        }
        else{
            $sql15 = "UPDATE `rolemasterdetails` SET  `report` = 0 WHERE `roleid` = 0001 ";
        }
        $firstresult = $conn->query($sql15);
        if(isset($_POST['checkbox16'])){
            $sql16 = "UPDATE `rolemasterdetails` SET `status` = 1 WHERE `roleid` = 0001";
        }
        else{
            $sql16 = "UPDATE `rolemasterdetails` SET `status` = 0 WHERE `roleid` = 0001";
        }
        $firstresult = $conn->query($sql16);


        if(isset($_POST['checkbox21'])){
            $sql21 = "UPDATE `rolemasterdetails` SET `employcreation` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql21 = "UPDATE `rolemasterdetails` SET `employcreation`= 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql21);
        if(isset($_POST['checkbox22'])){
            $sql22 = "UPDATE `rolemasterdetails` SET `roles` = 1 WHERE `roleid`= 0002";
        }
        else{
            $sql22 = "UPDATE `rolemasterdetails` SET `roles` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql22);
        if(isset($_POST['checkbox23'])){
            $sql23 = "UPDATE `rolemasterdetails` SET `inventory` = 1   WHERE `roleid` = 0002";
        }
        else{
            $sql23 = "UPDATE `rolemasterdetails` SET `inventory` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql23);
        if(isset($_POST['checkbox24'])){
            $sql24 = "UPDATE `rolemasterdetails` SET `request` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql24 = "UPDATE `rolemasterdetails` SET `request` = 0 WHERE `roleid`= 0002";
        }
        $secondresult = $conn->query($sql24);
        if(isset($_POST['checkbox25'])){
            $sql25 = "UPDATE `rolemasterdetails` SET `report` = 1 WHERE `roleid`= 0002";
        }
        else{
            $sql25 = "UPDATE `rolemasterdetails` SET `report` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql25);
        if(isset($_POST['checkbox26'])){
            $sql26 = "UPDATE `rolemasterdetails` SET `status` = 1 WHERE `roleid` = 0002";
        }
        else{
            $sql26 = "UPDATE `rolemasterdetails` SET `status` = 0 WHERE `roleid` = 0002";
        }
        $secondresult = $conn->query($sql26);
        if(isset($_POST['checkbox31'])){
            $sql31 = "UPDATE `rolemasterdetails` SET `employcreation` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql31 = "UPDATE `rolemasterdetails` SET  `employcreation` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql31);
        if(isset($_POST['checkbox32'])){
            $sql32 = "UPDATE `rolemasterdetails` SET `roles` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql32 = "UPDATE `rolemasterdetails` SET `roles` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql32);
        if(isset($_POST['checkbox33'])){
            $sql33 = "UPDATE `rolemasterdetails` SET `inventory` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql33 = "UPDATE `rolemasterdetails` SET  `inventory` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql33);
        if(isset($_POST['checkbox34'])){
            $sql34 = "UPDATE `rolemasterdetails` SET `request` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql34 = "UPDATE `rolemasterdetails` SET `request` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql34);
        if(isset($_POST['checkbox35'])){
            $sql35 = "UPDATE `rolemasterdetails` SET `report` = 1 WHERE  `roleid` = 0003 ";

        }
        else{
            $sql35 = "UPDATE `rolemasterdetails` SET  `report` = 0 WHERE `roleid` = 0003 ";
        }
        $thirdresult = $conn->query($sql35);
        if(isset($_POST['checkbox36'])){
            $sql36 = "UPDATE `rolemasterdetails` SET `status` = 1 WHERE `roleid` = 0003";
        }
        else{
            $sql36 = "UPDATE `rolemasterdetails` SET `status` = 0 WHERE `roleid` = 0003";
        }
        $thirdresult = $conn->query($sql36);


        if(isset($_POST['checkbox41'])){
            $sql41 = "UPDATE `rolemasterdetails` SET `employcreation` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql41 = "UPDATE `rolemasterdetails` SET `employcreation`= 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql41);
        if(isset($_POST['checkbox42'])){
            $sql42 = "UPDATE `rolemasterdetails` SET `roles` = 1 WHERE `roleid`= 0004";
        }
        else{
            $sql42 = "UPDATE `rolemasterdetails` SET `roles` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql42);
        if(isset($_POST['checkbox43'])){
            $sql43 = "UPDATE `rolemasterdetails` SET `inventory` = 1   WHERE `roleid` = 0004";
        }
        else{
            $sql43 = "UPDATE `rolemasterdetails` SET `inventory` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql43);
        if(isset($_POST['checkbox44'])){
            $sql44 = "UPDATE `rolemasterdetails` SET `request` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql44 = "UPDATE `rolemasterdetails` SET `request` = 0 WHERE `roleid`= 0004";
        }
        $fourthresult = $conn->query($sql44);
        if(isset($_POST['checkbox45'])){
            $sql45 = "UPDATE `rolemasterdetails` SET `report` = 1 WHERE `roleid`= 0004";
        }
        else{
            $sql45 = "UPDATE `rolemasterdetails` SET `report` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql45);
        if(isset($_POST['checkbox46'])){
            $sql46 = "UPDATE `rolemasterdetails` SET `status` = 1 WHERE `roleid` = 0004";
        }
        else{
            $sql46 = "UPDATE `rolemasterdetails` SET `status` = 0 WHERE `roleid` = 0004";
        }
        $fourthresult = $conn->query($sql46);
        if(isset($_POST['checkbox51'])){
            $sql51 = "UPDATE `rolemasterdetails` SET `employcreation` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql51 = "UPDATE `rolemasterdetails` SET  `employcreation` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql51);
        if(isset($_POST['checkbox52'])){
            $sql52 = "UPDATE `rolemasterdetails` SET `roles` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql52 = "UPDATE `rolemasterdetails` SET `roles` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql52);
        if(isset($_POST['checkbox53'])){
            $sql53 = "UPDATE `rolemasterdetails` SET `inventory` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql53 = "UPDATE `rolemasterdetails` SET  `inventory` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql53);
        if(isset($_POST['checkbox54'])){
            $sql54 = "UPDATE `rolemasterdetails` SET `request` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql54 = "UPDATE `rolemasterdetails` SET `request` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql54);
        if(isset($_POST['checkbox55'])){
            $sql55 = "UPDATE `rolemasterdetails` SET `report` = 1 WHERE  `roleid` = 0005 ";

        }
        else{
            $sql55 = "UPDATE `rolemasterdetails` SET  `report` = 0 WHERE `roleid` = 0005 ";
        }
        $fifthresult = $conn->query($sql55);
        if(isset($_POST['checkbox56'])){
            $sql56 = "UPDATE `rolemasterdetails` SET `status` = 1 WHERE `roleid` = 0005";
        }
        else{
            $sql56 = "UPDATE `rolemasterdetails` SET `status` = 0 WHERE `roleid` = 0005";
        }
        $fifthresult = $conn->query($sql56);


       echo "data updated successfully ";
    }


    // include "config.php";
    // if(isset($_POST['submit'])){
    //     $hrinfo  = $_POST['hrinfo'];
    //     $developerinfo = $_POST['developerinfo'];
    //     $admininfo = $_POST['admininfo'];
    //     $financeinfo = $_POST['financeinfo'];
    //     $chairmaninfo = $_POST['chairmaninfo'];
    //     $hr = $developer = $admin = $finance = $chairman = "";
    //     $hrcount = 0;
    //     $developercount = 0;
    //     $admincount =0;
    //     $financecount =0;
    //     $chairmancount = 0;

    //     foreach ($hrinfo as $hr1){
    //         $hr .= $hr1.",";
    //     }
    //   //  $hrsql = "INSERT INTO `roledetails` (`HR`) VALUES ('$hr')";
    //    // $hrquery  = mysqli_query($conn,$hrsql);
        
    //     foreach ($developerinfo as $developer1){
    //         $developer .= $developer1.",";
    //     }
    //   //  $developersql = "INSERT INTO `roledetails` (`Developer`) VALUES ('$developer')";
    //    // $developerquery = mysqli_query($conn,$developersql);

    //     foreach ($admininfo as $admin1){
    //         $admin .= $admin1.",";
    //     }
    //    // $adminsql ="INSERT INTO `roledetails` (`Admin`) VALUES ('$admin')";
    //     //$adminquery = mysqli_query($conn,$adminsql);

    //     foreach ($financeinfo as $finance1){
    //         $finance .= $finance1.",";
    //     }
    //    // $financesql = "INSERT INTO `roledetails` (`Finance`) VALUES ('$finance')";
    //    // $financequery = mysqli_query($conn,$financesql);

    //     foreach ($chairmaninfo as $chairman1){
    //         $chairman .= $chairman1.",";
    //     }
    //     $chairmansql = "INSERT INTO `roledetails` (`HR`,`Developer`,`Admin`,`Finance`,`Chairman`) VALUES ('$hr','$developer','$admin','$finance','$chairman')";
    //     $chairmanquery = mysqli_query($conn,$chairmansql);

    // }

    // include "config.php";
    // $inchargeinfo = $_POST['inchargeinfo'];
    // $developerinfo = $_POST['developerinfo'];
    // $admininfo = $_POST['admininfo'];
    // $financeinfo = $_POST['financeinfo'];
    // $executiveinfo = $_POST['executiveinfo'];

    // $inchargecount = 0;
    // $developercount = 0;
    // $admincount = 0;
    // $financecount = 0;
    // $executivecount = 0;

    // $incharge = $developer = $admin = $finance = $executive = "";

    // foreach ($inchargeinfo as $incharge1){
    //     $incharge .= $incharge1;
    //     $inchargecount++;
    //     if($inchargecount == 1){

    //         $inchargesql = "UPDATE `rolemasterdetails` SET `employcreation` = '1' WHERE $inchargeinfo[$inchargecount] = 0";

    //     }
    //     elseif ($inchargecount == 2){
    //         $inchargesql = "UPDATE `rolemasterdetails` SET `roles` = '1' WHERE $inchargeinfo[$inchargecount] = 0";
    //     }
    //     elseif ($inchargecount == 3){
    //         $inchargesql = "UPDATE `rolemasterdetails` SET `inventory` = '1' WHERE $inchargeinfo[$inchargecount] = 0";
    //     }
    //     elseif ($inchargecount == 4){
    //         $inchargesql = "UPDATE `rolemasterdetails` SET `request` = '1' WHERE $inchargeinfo[$inchargecount] = 0";
    //     }
    //     elseif ($inchargecount == 5){
    //         $inchargesql = "UPDATE `rolemasterdetails` SET `report` = '1' WHERE $inchargeinfo[$inchargecount] = 0";
    //     }
    //     elseif ($inchargecount == 6){
    //         $inchargesql = "UPDATE `rolemasterdetails` SET `status` = '1' WHERE $inchargeinfo[$inchargecount] = 0";
    //     }
    //     $inchargequery = mysqli_query($conn,$inchargesql);
    
    // }



    ?>
  
     
</body>
</html>