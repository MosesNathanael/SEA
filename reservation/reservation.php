<?php
    include "database.php";

    if(isset($_POST['submit_reservation'])){
        $service = $_POST['service'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        
        $sql = "INSERT INTO reservationdb (Email, Phonenumber, Location, Service, Date, Time) VALUES
        ('$email', '$phonenumber','$location','$service','$date','$time')";
        if($db->query($sql)){
            echo "OK MANTAP";
        }else{
            echo "Data Gagal masuk";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation2.css">
    <title>SEA Salon</title>
</head>
<body>
    <?php include "popup_reservation.html" ?>
</body>
</html>
