<?php

//include "dbConn.php"; // Using database connection file here
$db_user = "root";
$db_pass ="";
$db_name = "useraccounts";
$db_port = 3308;
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

$result = $mysqli->query("SELECT * FROM localguideusers");

$email = $_GET['id']; // get id through query string

$del = $mysqli->query("delete from localguideusers where email = '$email'"); // delete query

if($del)
{
    //mysqli_close($db); // Close connection
    header("location:admin.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>