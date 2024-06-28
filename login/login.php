

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
      <h2>Login</h2>
      <form action="login.php" method="post">
        <div class="form-field">
          <label for="email" class="labelemail" >Your email</label>
          <br>
          <input type="email" id="email" name="email" placeholder="e.g. salon@gmail.com" required>
          <br>
        </div>
        <div class="form-field">
          <label for="password" class="labelpass">Your password</label>
          <br>
          <input type="password" id="password" name="password" placeholder="e.g. iloveyou3000" required>
        </div>
        <button type="submit" name="login"><b>LOGIN</b></button>
      </form>
      <div class ="php">
        <?php
            include "database.php";
            session_start();
            if(isset($_POST['login'])){
              $email = $_POST['email'];
              $password = $_POST['password'];
              $hashpassword = hash("sha256",$password);
              $sql = "SELECT * FROM customers WHERE Email = '$email' AND Password = '$hashpassword'";
              

              $result = $db->query($sql);
              if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                $_SESSION["name"] = $data["FullName"];
                $_SESSION["email"] = $data["Email"];  
                $_SESSION["is_login"] = true;
                header("location: ../dashboard/customer.php");
              }else {
                echo "Invalid Password/Email";
              }
              $db->close();
            }
          ?>
        </div>
      <a href="register.php" class="aLogin">Don't have an account?</a>
      <!-- <a href="" class="aLogin">Forgot password?</a> -->
    </div>
</html>
