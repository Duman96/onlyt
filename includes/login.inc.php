<?php

if (isset( $POST["submit"] )) {
  // code...
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once 'dbc.inc.php';
  require_once 'func.inc.php';

  if( emptyInputLogin($username, $pwd) !== false ){
    header("location: ../login.php?error=emptyinput");
    exit();
  }

  loginUser( $conn, $username, $pwd );
}
else{
  header( "location: ../login.php" );
  exit();
}
