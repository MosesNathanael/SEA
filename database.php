<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "sea_salon reservation";

$db = mysqli_connect($hostname, $username, $password, $database_name);
if($db->connect_error){
    echo "Fail to connect";
    die("error!");
}

?>