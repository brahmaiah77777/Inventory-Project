<?php

   include "homepage.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background:green;
            color:aliceblue;
            font-size:20px;
        }
        
    </style>
</head>
<body>
    
    <fieldset>
    <legend>Roles Information</legend>
    <center>
    <form action="" method="POST">
    <h1>Roles Information</h1>
        <label for="" style="font-size:27px;">roles :</label>
        <select name="" id="" style="font-size:27px;">
            <option value="select">select</option>
            <option value="finance">Finance</option>
            <option value="developer">Developer</option>
        </select><br><br>
        <label for="">Inventory type :</label>
        
        <input type="radio" name="newcreation" id="">new creating Inventory
        <br><br>
        <input type="radio" name="newcreation" id="">submit of inventory
        <br><br>

        <label for="">Multiple roles :</label>
        <input type="checkbox" name="creative" id="">Developer
        <input type="checkbox" name="creative" id="">Finance
        <br><br>
        <input type="checkbox" name="creative" id="">Admin
        <input type="checkbox" name="creative" id="">Executive
        <br><br>
        <input type="submit" name="submit" id="" value="submit">
        <input type="submit" name="clear" id="" value="clear">
    </form>
    </center>
    </fieldset>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    echo "employ role information will be submitted succefully";
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clear'])){
    echo "employ role information will be deleted ";
}
?>
 
 