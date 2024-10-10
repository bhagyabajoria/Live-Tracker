<?php require("config.php"); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="assets/login.css" />
    <title>Esports Game India</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/logo/favicon-16x16.png">
    <link rel="manifest" href="/logo/site.webmanifest">
    <link rel="mask-icon" href="/logo/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/logo/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/logo/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pass"/>
            </div>
            <input type="submit" value="Login" class="btn solid" name="Login"/>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Esports Game India </h3>
            <p>
              Track your progress! Sign in to see your points & leaderboard in the tournament.
            </p>
          </div>
          <img src="img/egilogog.png" class="image" alt="Esports Game India 🇮🇳" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
<?php

  if(isset($_POST['Login'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $query="SELECT * FROM `user` WHERE `email`='$email' AND `password`='$pass'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1){
      session_start();
      $row= mysqli_fetch_assoc($result);
      if ($row['email'] === $email && $row['password'] === $pass ){
         $_SESSION['email'] = $row['email'];
         $_SESSION['name'] = $row['Name'];
         $_SESSION['logo'] = $row['logo'];
         $_SESSION['db'] = $row['db'];
         $_SESSION['id'] = $row['id'];
         header("Location: home.php");
      }
    }
    else{
      echo "<script>alert('Incorrect Email id or Password');</script>";
    }
  }

?>


  </body>
</html>
