<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "dept_website";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}
else{
    session_start();
}

?>