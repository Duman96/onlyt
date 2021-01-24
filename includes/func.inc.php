<?php

function emptyInputLogin( $username, $pwd ){

  $result;
  if( empty( $username ) || empty( $pwd ) ){
    $result = true;
  }else {
    $result = false;
  }
  return $result;

}

function uidExists( $conn, $username, $email ){

  $sql = "SELECT * from users where username = ? OR user_email = ?";
  $stmt = mysqli_stmt_init($conn);
  //If sql query failed
  if ( !msqli_stmt_prepare($stmt, $sql) ) {
    header( "location: ../login.php?error=stmtfailed" );
    exit();
  }

  mysqli_stmt_bind_param( $stmt, "ss", $username, $email );
  mysqli_stmt_execute( $stmt );

  $resultData = mysqli_stmt_get_result( $stmt );

  if ( $row = mysqli_fetch_assoc( $resultData ) ) {
    return $row;
  }else {
    $result = false;
    return $result;
  }

}

function loginUser( $conn, $username, $pwd ){

  $uidExists = uidExists( $conn, $username, $username );

  if ( $uidExists === false ) {
    header( "location: ../login.php?error=wronglogin" );
    exit();
  }

  $pwdHashed = $uidExists["password"];
  $checkPwd = password_verify( $pwd, $pwdHashed );

  if ( $checkPwd === false ) {
    header( "location: ../login.php?error=wronglogin" );
    exit();
  } elseif ( $checkPwd === true ) {
    session_start();
    $_SESSION["userid"] = $uidExists["user_id"];
    $_SESSION["useruid"] = $uidExists["username"];
    header( "location: ../index.php" );
    exit();
  }
}
