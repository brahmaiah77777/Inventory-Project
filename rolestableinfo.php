<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:aquamarine;
        }
        tr th {
            background-color: black;
            padding: 10px;
            color:  bisque;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        tr td {
            padding: 9px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color:hotpink;
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
    

<?php

include "config.php";

$result = mysqli_query($conn,"SELECT * FROM `rolemasterdetails`");

echo "<table border= '1' align = 'center'>
          <tr>
          <th>roleid</th>
          <th>rolename</th>
          <th>employcreation</th>
          <th>roles</th>
          <th>inventory</th>
          <th>request</th>
          <th>report</th>
          <th>status</th>
          <th>statusinfo</th>
          </tr>";

          while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['roleid'] . "</td>";
                echo "<td>" . $row['rolename'] . "</td>";
                echo "<td>" . $row['employcreation'] . "</td>";
                echo "<td>" . $row['roles'] . "</td>";
                echo "<td>" . $row['inventory'] . "</td>";
                echo "<td>" . $row['request'] . "</td>";
                echo "<td>" . $row['report'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['statusinfo'] . "</td>";
                echo "</tr>";
            }
                echo "</table>";

                mysqli_close($conn);
?>

</body>
</html>