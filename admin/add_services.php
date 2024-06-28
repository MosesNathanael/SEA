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
    <title>SEA SALON</title>
    <link rel="stylesheet" href="add_services.css">
  </head>
  <body>
    <img src="../img/logoSalon.png" width="130" alt="logoSalon" height="120" >
    <div class="container">
      <img>
      <h2>Add New Services</h2>
      <form action="add_services.php" method="post">
        <div class="form-field">
          <label for="email" class="labelemail" >Branch Location</label>
          <br>
          <select id ="email" name="email">
          <?php
             $branch = getBranch();
            if(mysqli_num_rows($branch) > 0) {
              foreach($branch as $item) {     
                ?>
                 <option><?= $item["Location"] ?></option>

                <?php
              }
            }
            ?>
          </select>
          <br>
        </div>
        <div class="form-field">
            <label for="phonenumber" class="labelphonenumber">Services</label>
            <br>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="e.g. haircuts" required>
            <br>
        </div>
        <div class="form-field">
          <label for="password" class="labelpass">Duration per Session</label>
          <br>
          <input type="text" id="password" name="password" placeholder="e.g. 2 hours" required>
        </div>
        <button type="submit" name="submit_registration"><b>Create</b></button>
      </form>
      <div class="message">
        <?php
            include "../database.php";

            if(isset($_POST['submit_registration'])){
                $name = $_POST['username'];
                $location = $_POST['email'];
                $services = $_POST['phonenumber'];
                $duration = $_POST['password'];

                $sql = "INSERT INTO services (BranchName, Location, Services, Duration) VALUES 
                ('$name','$location', '$services', '$duration')";
                
                try {
                  if($db->query( $sql )){
                    header("location:admin_dashboard.php");
                  }else {
                    echo "Failed";
                  }
                } catch (mysqli_sql_exception){
                  echo "We are unable to register this Branch because this Branch already exists.";
                }
                $db->close();
            }
            
        ?>  
      </div>
      <a href="admin_dashboard.php" class="back">Back</a>
    </div>
</html>
