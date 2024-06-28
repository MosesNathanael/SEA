<?php
function getOrders(){
    include "database.php";
    $email = $_SESSION["email"];
    $sql = "SELECT * FROM reservationdb WHERE Email = '$email'";
    return $result = $db->query($sql);
}

function getBranch(){
    include "reservation/database.php";
    // $BranchName = $_SESSION["BranchName"];
    // $BranchLocation = $_SESSION["BranchLocation"];
    // $OpeningTime = $_SESSION["OpeningTime"];
    // $ClosingTime = $_SESSION["ClosingTime"];
    $sql = "SELECT * FROM branch";
    $result = $db->query($sql);
    return $result;

}


function SaveReservation1(){
    include "database.php"; 
    if(isset($_POST["next"])){
        $email = $_POST["name"];
        $phonenumber = $_POST["phonenumber"];
        $location = $_POST["location"];
        $sql = "INSERT INTO reservationdb (Email, Phonenumber, Location) VALUES ('$email', '$phonenumber','$location')";
        $result = $db->query($sql);
        return $result;
    }

}


function SaveReservation2(){
    include "database.php";
    if(isset($_POST["submit_reservation"])){
        $service = $_POST["service"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $sql = "INSERT INTO reservationdb (Service, Date, Time) VALUES ('$service', '$date','$time')";
        $result = $db->query($sql);
        return $result;
    }
} 

function getLocation(){
    session_start();
    include "reservation/database.php";
    $location = $_SESSION["location"];
    $sql = "SELECT * FROM services WHERE Location = '$location'";
    return $result = $db->query($sql);
} 


function SaveData(){
    include "database.php";
    $email = $_SESSION["email"];
    $phonenumber = $_SESSION["phonenumber"];
    $location = $_SESSION["location"];
    $service = $_SESSION["service"];
    $date = $_SESSION["date"];
    $time = $_SESSION["time"];
    $sql = "INSERT INTO `reservationdb`(`Email`, `PhoneNumber`, `Service`, `Date`, `Time`, `Location`) 
            VALUES ('$email','$phonenumber','$service','$date','$time','$location')";
    $result = $db->query($sql);
    return $result; 
}