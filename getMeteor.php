<!DOCTYPE html>
<html>
<head>





<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>


</head>
<body>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meteoriteland";

 $q = $_GET['q'];

//$q = $_GET['recclass'];

$con = mysqli_connect($servername,$username,$password,$dbname);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,$dbname);
// $sql="SELECT * FROM meteorite_landings WHERE recclass = ".$q." LIMIT 35002";

// $sql = "SELECT id, name, recclass, year, fall, reclat, reclong, mass FROM meteorite_landings ORDER BY rand() LIMIT 5";

//$sql = "SELECT id, name, recclass, year, fall, reclat, reclong, mass FROM meteorite_landings WHERE recclass = " .$q. " ORDER BY recclass LIMIT 15";
$sql = "SELECT id, name, recclass, year, fall, reclat, reclong, mass FROM meteorite_landings WHERE recclass LIKE '$q%' ORDER BY mass DESC LIMIT 1900";


$countMeteor=0;
$result = mysqli_query($con,$sql);
echo "<b>Meteorites of the Classification: " .  $q . "</b>";
?>
<table>
<tr>
<th>Count</th>
<th>ID</th>
<th>Name</th>
<th>Classification</th>
<th>X</th>
<th>X</th>
<th>Lat/ Long</th>
<th><b>Mass (G)</b></th>
</tr>

<tbody id="MeteorTable">

    <?php
while($row = mysqli_fetch_array($result)) {
    $link="https://www.google.com/search?ei=xqpIXZfPJcv8tAWohJxg&q=https%3A%2F%2Fmeteorlandings.org+" . $row['name']; 
    //echo $link . "<br>";
    echo "<tr>";
    echo "<td>" . $countMeteor . "</td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td><a href=\"" . $link . "\" target=\"_blank\">" . $row['name'] . "</a></td>";
    echo "<td>" . $row['recclass'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['fall'] . "</td>";

    echo "<td><a href=\"https://www.google.com/maps?q=" . $row['reclat'] . "," . $row['reclong']  . "\" target=\"_blank\">" . $row['reclat'] . " <b> " . $row['reclong'] . "</b></a></td>";
    
    echo "<td>" . $row['mass'] . "</td>";
    
    echo "</tr>";
    $countMeteor++;
}
echo "</tbody></table>";
mysqli_close($con);

?>
</body>
</html>