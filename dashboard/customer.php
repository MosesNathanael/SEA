<?php
  session_start();
  include "../getData.php";
  include "../database.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <!-- Feather Icons-->
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <nav class="navbar">
      <button class="Logout" onclick="logout()">Logout</button>
      <div class="navbar-extra">
        <i data-feather="bell" class="notif" height="50px"></i>
        <h2><?= $_SESSION["name"] ?></h2>
        <i data-feather="user" class="profile"></i>
      </div>
    </nav>

    <div class="container1">
      <div class="header">
        <h2 class ="title">Recent/Upcoming Reservation</h2>
        <button class="btn" onclick="form_reservation()">New Recervation+</button>
      </div>
    <br>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Service</th>
            <th>Total Payments</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $reservations = getOrders();
          if(mysqli_num_rows($reservations) > 0) {
            foreach($reservations as $item) {
              if($item["Service"] == "haircuts") {
                $harga = "Rp100.000,-";
              }
              else if($item["Service"] == "facial") {
                $harga = "Rp150.000,-";
              }
              else if($item["Service"] == "medicure") {
                $harga = "Rp180.000,-";
              }else {
                $harga = "Rp200.000,-";
              }
                  
              ?>
                <tr>
                  <td><?= $item['Date'] ?></td>
                  <td><?= $item['Time'] ?></td>
                  <td><?= $item['Service'] ?></td>
                  <td><?= $harga ?></td>
                </tr>

              <?php
            }
          }else {
              ?>
                <tr>
                  <td colspan="5">No orders yet</td>
                </tr>
              <?php
            }
          
          ?>
        </tbody>

      </table>
    </div>
    <script src="customer.js">

    </script>
    <script>
      feather.replace();
    </script>
  </body>
</html>


