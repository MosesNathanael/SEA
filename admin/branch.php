
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SEA SALON</title>
    <link rel="stylesheet" href="branch.css">
  </head>
  <body>
    <img src="../img/logoSalon.png" width="130" alt="logoSalon" height="120" >
    <div class="container">
      <img>
      <h2>Add New Branch</h2>
      <form action="branch.php" method="post">
        <div class="form-field">
            <label for="username" class="labelname">Branch Name</label>
            <br>
            <input type="text" id="username" name="username" placeholder="e.g Sea Salon " required>
            <br>
        </div>
        <div class="form-field">
          <label for="email" class="labelemail" >Branch Location</label>
          <br>
          <input type="text" id="email" name="email" placeholder="e.g. Citra Garden 5 Blok A9" required>
          <br>
        </div>
        <div class="form-field">
            <label for="phonenumber" class="labelphonenumber">Opening Time</label>
            <br>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="e.g. 08:00" required>
            <br>
        </div>
        <div class="form-field">
          <label for="password" class="labelpass">Closing Time</label>
          <br>
          <input type="text" id="password" name="password" placeholder="e.g. 22:00" required>
        </div>
        <button type="submit" name="submit_registration"><b>Create</b></button>
      </form>
      <div class="message">
        <?php
            include "../database.php";

            if(isset($_POST['submit_registration'])){
                $name = $_POST['username'];
                $location = $_POST['email'];
                $opentime = $_POST['phonenumber'];
                $closetime = $_POST['password'];

                $sql = "INSERT INTO branch (Name, Location, OpeningTime, ClosingTime) VALUES 
                ('$name','$location', '$opentime', '$closetime')";
                $result = $db->query($sql);
                try {
                  if($result){
                  
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
