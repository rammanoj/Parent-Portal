<?php

/*
* Check if database already exists
*/
function check_existence() {
  try {
    $server = new PDO("mysql:host=localhost", 'root', 'password' );
    $server1 = $server->prepare("SHOW DATABASES LIKE 'student'");
    $server1->execute();
    $count = $server1->rowCount();
    return $count;
  }
  catch(Exception $e) {
    return -1;
  }
}

$var = check_existence();
if ( $var >= 1 ) {
    echo 1;
    header( 'Location: ../login.php' );
} else {
    echo -1;
}
?>
