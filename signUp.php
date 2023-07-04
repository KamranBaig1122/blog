<?php
require 'config/constants.php';

//get data back if error occurs
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpass = $_SESSION['signup-data']['createpass'] ?? null;
$confrmpass = $_SESSION['signup-data']['confrmpass'] ?? null;
unset($_SESSION['signup-data']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

<section class="form_section">
    <div class="container form_section_container">
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])) : ?>
          <div class="alert_message error">
            <p>
              <?= 
                $_SESSION['signup'];
                unset($_SESSION['signup']);
              ?>
            </p>
        </div>
        <?php endif ?>
        <form method="post" action="<?= ROOT_URL ?>signup_logic.php" enctype="multipart/form-data">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
            <input type="email" name="email" value="<?= $email ?>" placeholder="email">
            <input type="password" name="createpass" value="<?= $createpass ?>" placeholder="Create Password">
            <input type="password" name="confrmpass" value="<?= $confrmpass ?>" placeholder="Confirm Password">
            <div class="form_control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar" >
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>

  </body>
  </html>