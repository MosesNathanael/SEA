<?php
include "database.php";
include "../getData.php";
session_start();
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
      <a href="../dashboard/customer.php" id="back"><i data-feather="log-out"></i></a>
      <h1>SEA Salon Reservation Form</h1>
      <div class="container">
        <h2 class="heading">Reservation Online</h2>
        <form action="reservation_template.php" method="post">
          <!-- <div class="form-field">
            <label for="name">Your Email</label>
            <input
              type="email"
              name="name"
              id="name"
              placeholder="Your Email"
              required
            />
          </div> -->

          <div class="form-field">
            <label for="phone">Phone Number</label>
            <input
              type="tel"
              id="phone"
              name="phonenumber"
              placeholder="Your Number"
              required
            />
          </div>
        
          <div class="form-field">
            <label for="location">Branch Location</label>
            <select name="select" class="location" id="select" onchange = "this.form.submit()">
              <option>Please Select</option>
              <?php
                $branch = getBranch();
                while($data = $branch->fetch_assoc()){
                  ?>
                    <option value = "<?= $data['Location']; ?>"
                    <?php
                    set_error_handler(function($errno, $errstr, $errfile, $errline) {
                      if (0 === error_reporting()) {
                          return false;
                      }
                      
                      throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
                    });
                    try{
                      if($_POST["select"] == $data['Location']){
                        echo 'selected';
                      }else{
                        echo '';
                      }
                    }catch(ErrorException $e){
                      echo '';
                    }
                    ?>
                    
                    ><?= $data['Location']; ?></on>
                  <?php
                }
              ?>  
            </select>
          </div>

            <div class="form-field">
                  <label for="service">Services</label>
                  <select id="service" name="service" class="service" required>
                  <option value="">Please Select</option>
                  <?php
                      
                      if(isset($_POST['select']) && !empty($_POST['select'])) {
                        $_SESSION['location'] = $_POST['select'];
                        $query = $db->query("SELECT * FROM services WHERE Location= '$_POST[select]' ");
                        if(mysqli_num_rows($query) > 0) {
                          foreach($query as $item) {
                            ?>
                              <option><?= $item['Services']?></option>
                            <?php
                          }
                        }
                        else{
                          ?>
                            <option>Haircuts & Styling</option>
                            <option>Manicure & Pedicure</option>
                            <option>Facial Treatments</option>
                          <?php
                        }
                      }
                  ?>
                  </select>
              </div>
              <div class="form-field">
                  <label for="date">Date</label>
                  <input type="date" id="date" name="date" required />
              </div>

              <div class="form-field">
                  <label for="time">Time</label>
                  <select id="time" name="time" class="time" required>
                  <option value="">Please Select</option>
                  <option>9.00 - 10.00</option>
                  <option>10.00 - 11.00</option>
                  <option>11.00 - 12.00</option>
                  <option>13.00 - 14.00</option>
                  <option>14.00 - 15.00</option>
                  <option>16.00 - 17.00</option>
                  <option>18.00 - 19.00</option>
                  <option>20.00 - 21.00</option>
                  <option>21.00 - 22.00</option>
                  </select>
              </div>
            <button type="submit" class="btn" name="submit_reservation">
              <a><b>Submit</b></a>
            </button>
          </form>
              <?php        
            if(isset($_POST['submit_reservation'])){
                $email =  $_SESSION["email"];
                $phonenumber = $_POST['phonenumber'];
                $location = $_SESSION['location'];
                $services = $_POST['service'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $sql = "INSERT INTO reservationdb (Email, PhoneNumber, Location, Service, Date, Time)  VALUES 
                        ('$email', '$phonenumber','$location','$services','$date','$time')";
                $rslt = $db->query( $sql );
                if($rslt){
                  header("location:../dashboard/customer.php");
                }
        
            }
            ?>
          <!--  -->
      </div>
    </div>
          
    <script>
      feather.replace();
    </script>
    <!-- <script src="reservation.js"></script> -->
  </body>
</html>
