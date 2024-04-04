<?php
session_start();

$username = $_SESSION["username"];
$email = $_SESSION["useremail"];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Document</title>
    <link rel="stylesheet" href="css/dashbord.css" />
  </head>
  <body>
    <div class="dashbord">
      <!-- nav left -->
      <div class="nav-left">
        <i class="fa fa-user" aria-hidden="true"></i>
        <h2 id="username"><?php echo $username; ?></h2>
        <p id="emailuser"><?php echo $email; ?></p>
        <div class="allnav">
          <h1 id="navDashbord">
            <i class="fa fa-id-card-o" aria-hidden="true"></i>Dashbord
          </h1>

          <h1 id="navFile">
            <i class="fa fa-folder-open-o" aria-hidden="true"></i>File
          </h1>

          <h1 id="navMessage">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>Message
          </h1>

          <h1 id="navnotification">
            <i class="fa fa-bell-o" aria-hidden="true"></i>notification
          </h1>
        </div>
      </div>
      <!-- nav left -->
      <!-- nav top -->
      <div class="page">
        <div class="nav-top">
          <h1>Dashboard</h1>

          <!-- search -->
          <div class="search">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" class="input-searsh" />
          </div>
          <!-- search -->
        </div>
        <div class="allstats">
          <div class="stats">
            
        <div class="stat" >    <p>Earning</p>
            <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <h1>$ 1202</h1>
          </div>

          <div class="stats">
        <div class="stat" >    <p>Earning</p>
            <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <h1>$ 1202</h1>
          </div>

          <div class="stats">
        <div class="stat" >    <p>Earning</p>
            <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <h1>$ 1202</h1>
          </div>

          <div class="stats">
        <div class="stat" >    <p>Earning</p>
            <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <h1>$ 1202</h1>
          </div>
          <div class="stats">
        <div class="stat" >    <p>Earning</p>
            <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <h1>$ 1202</h1>
          </div>
        </div>
      </div>
      <!-- nav top -->
    </div>
    <script src="js/dashbord.css"></script>
  </body>
</html>