<?php
$link = mysqli_connect("localhost", "root", "", "map");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Start XML file, create parent node
$latitude = $request->latitude;
$longitude = $request->longitude;



// Select all the rows in the markers table

$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if(mysqli_query($link, $sql)){
            echo "Records retrieved successfully.";
            return 'You have ploted the following coordinates from the database: Latitude: ' . $latitude .' Longitude: ' . $longitude;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each




?>