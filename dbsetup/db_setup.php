<?php

function setup_db()
{
  try {
    $connect_server = new PDO("mysql:host=localhost", 'root', 'password' );
    $create_default = $connect_server->prepare("CREATE DATABASE student");
    $create_default->execute();
    $connect_server = new PDO("mysql:host=localhost;dbname=student", 'root','password' );
    $connect_server->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file = file_get_contents("database.sql");
    $file_content = file_get_contents("exam_tables.sql");
    $create_tables = $connect_server->prepare($file);
    $create_content = $connect_server->prepare($file_content);
    $create_tables->execute();
    $create_content->execute();
  }
  catch(Exception $e) {
    echo "Server error occured please again later";
  }
}

 ?>
