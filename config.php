<?php
$servername = "localhost";
$username	= "root";
$password	= "";
$database	= "spartan";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) {
	die("Could not connect. Error: ".$conn->connect_error);
}
// echo "<center>Connected successfully</center>";
?>
