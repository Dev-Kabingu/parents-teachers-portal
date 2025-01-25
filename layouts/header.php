<?php
 session_start();

 $authenticated = false;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduPro CBC</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- header -->
    <header>
      <div class="navigation_bar">
        <nav class="navbar_links">
          <h2 class="logo">Edu<span>Pro</span></h2>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Home</a></li>
          </ul>
        </nav>
        <!-- display if authenticated -->
         <?php
         if ($authenticated){
         ?>
        <!-- admin -->
        <nav class="navbar_links">
          <ul class="dropdown">
            <li><a href="profile.php" class="dropdown_item">admin</a>
                <ul class="dropdown_menu">
                    <li><a href="profile.php" class="dropdown_item">Profile</a></li>
                    <li><a href="logout.php" class="dropdown_item">logout</a></li>
                  </ul>
            </li>
        </ul>
          <?php
          } else {
          ?>
          <!-- register & login buttons -->
          <ul class="navbar_buttons">
            <li class="nav_item">
              <a href="register.php" class="registerBtn">Register</a>
            </li>
            <li class="nav_item">
              <a href="login.php" class="loginBtn">login</a>
            </li>
          </ul>
          <?php
          }
          ?>
        </nav>
      </div>
    </header>