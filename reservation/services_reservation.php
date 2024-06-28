<?php
    include "database.php";
    include "../getData.php";
    if(isset($_POST["next"])){
        $email = $_POST["name"];
        $phonenumber = $_POST["phonenumber"];
        $location = $_POST["location"];
        $_SESSION['location'] = $location;
        $_SESSION['phonenumber'] = $phonenumber;
        $_SESSION['email'] = $email;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SEA Salon</title>
    <!-- Feather Icons-->
    <script src="https://unpkg.com/feather-icons"></script>
    <!--My Script-->
    <link rel="stylesheet" href="reservation.css" />
  </head>

  <body>
    <div class=".bg">
      <a href="../index.html" id="back"><i data-feather="log-out"></i></a>
      <h1>SEA Salon Reservation Form</h1>
      <div class="container">
        <h2 class="heading">Reservation Online</h2>
        <form action="services_reservation.php" method="post">
            
    <?php
      SaveData();

    ?>
          
    
    <script>
      feather.replace();
    </script>
    <script src="../dashboard/customer.js"></script>
    <!-- <script src="reservation.js"></script> -->
  </body>
</html>
