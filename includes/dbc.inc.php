<?php
// DB parameters. DB created on 46.17.175.43 host
$serverName = "46.17.175.43";
$dbUserName = "u185387889_Creator";
$dbPassword = "Htmlcssjs2021";
$dbName = "u185387889_only_tech";

$conn = mysqli_connect( $serverName, $dbUserName, $dbPassword, $dbName ); //Connection to DB

if (!$conn) {
  // If connection fails
  die( "Connection Failed: " . mysqli_connect_error() );
}
