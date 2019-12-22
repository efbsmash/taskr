<?php

$host = 'localhost';
$dbName = 'tasks';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn){
    die("Connection to Database Failed: " .mysqli_connect_error());
}else{
  // echo 'Connected to the Database Succesfully';
}
