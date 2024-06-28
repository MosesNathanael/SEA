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
    <link rel="stylesheet" href="admin_dashboard.css">
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
        <h2>Thomas</h2>
        <i data-feather="user" class="profile"></i>
      </div>
    </nav>

    <div class="container1">
      <div class="header">
        <h2 class ="title">SEA Salon Branch</h2>
        <button class="btn" onclick="create_branch()">Add New Branch+</button>
        <button class="btn" onclick="create_services()">Add Services+</button>
      </div>
    <br>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th>OpeningTime</th>
            <th>ClosingTime</th>
          </tr>
        </thead>
        <tbody>
          <?php
             $branch = getBranch();
            if(mysqli_num_rows($branch) > 0) {
              foreach($branch as $item) {     
                ?>
                  <tr>
                    <td><?= $item['Name'] ?></td>
                    <td><?= $item['Location'] ?></td>
                    <td><?= $item['OpeningTime'] ?></td>
                    <td><?= $item['ClosingTime'] ?></td>
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
    <script>
        function create_branch(){
            window.location.href = "branch.php";
        }
        function create_services(){
            window.location.href = "add_services.php";
        }
        function logout(){
          window.location.href = "../index.html";
        }

    </script>
    <script>
      feather.replace();
    </script>
  </body>
</html>


