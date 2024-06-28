
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SEA SALON</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <img src="../img/logoSalon.png" width="130" alt="logoSalon" height="120" >
    <div class="container">
      <img>
      <h2>Create Account</h2>
      <form action="register.php" method="post">
        <div class="form-field">
            <label for="username" class="labelname">Full Name</label>
            <br>
            <input type="text" id="username" name="username" placeholder="e.g Sea Salon " required>
            <br>
        </div>
        <div class="form-field">
          <label for="email" class="labelemail" >Your email</label>
          <br>
          <input type="email" id="email" name="email" placeholder="e.g. salon@gmail.com" required>
          <br>
        </div>
        <div class="form-field">
            <label for="phonenumber" class="labelphonenumber">Phone Number</label>
            <br>
            <input type="tel" name="phonenumber" id="phonenumber" placeholder="e.g. 012356839221" required>
            <br>
        </div>
        <div class="form-field">
          <label for="password" class="labelpass">Your password</label>
          <br>
          <input type="password" id="password" name="password" placeholder="e.g. iloveyou3000" required>
        </div>
        <button type="submit" name="submit_registration"><b>Register</b></button>
      </form>
      <div class="message">
        <?php
            include "database.php";

            if(isset($_POST['submit_registration'])){
                $name = $_POST['username'];
                $email = $_POST['email'];
                $phonenumber = $_POST['phonenumber'];
                $password = $_POST['password'];
                $hashpassword = hash("sha256", $password);

                $sql = "INSERT INTO customers (FullName, Email, PhoneNumber, Password) VALUES 
                ('$name','$email', '$phonenumber', '$hashpassword')";
                
                try {
                  if($db->query( $sql )){
                    echo "User Registration Successful! Please Login.";
                  }else {
                    echo "User Registration Failed";
                  }
                } catch (mysqli_sql_exception){
                  echo "We are unable to register this email address because a registration already exists.";
                }
                $db->close();
            }
            
        ?>  
      </div>
      <a href="login.php" class="back">Login</a>
    </div>
</html>
