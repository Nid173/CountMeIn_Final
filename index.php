<?php
include 'joins/db.php';
include 'joins/config.php';

session_start();
if(!empty($_POST["login-email"])){
  $query = "SELECT * FROM users_234 WHERE email ='"
  . $_POST["login-email"]
  . "' and password = '"
  . $_POST["login-password"]
  ."'";

  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);

  if(is_array($row)){
    $_SESSION["id"] = $row['id'];
    header('location:' . URL . 'Dashboard.php?id='.$_SESSION['id']);

  }else {
    echo "authentication failure";
  }
}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CountMeIn</title>

    <!-- Bootstrap -->
    <link href="include/css/bootstrap.min.css" rel="stylesheet">
    <link href="include/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet">
  </head>
  <body>
    <main>
      <section id="index-main">

          <section id="orange-section" class="col-xs-11 col-md-7">
            <div id="index-logo">
                <h1>OuntMeIn</h1>
            </div>
            <p>SMALL BUSNIES?!<br>We Are Here For you..</p>
          </section>

          <section id="white-section" class="col-xs-11 col-md-5">
            <p>
              <strong>CountMeIn</strong> is a Virtual Secretary that Makes the communication
              between small busnieses and their Clients:<br>
              <strong >Simple, Easy & Smart</strong>
            </p>
          </section>
          <button class="btn btn-default" type="button" name="signup">Sign up</button>
          <button class="btn btn-primary" type="button" name="signin">Sign in</button>

      </section>

      <section id="signInForm" class="col-xs-12">
        <form class="form-group col-md-8 row" action="#" method="post">
          <button type="button" name="close">&times;</button>
          <div class="col-sm-3 col-sm-offset-3">
            <img src="images/Count_me_in_logo_Big.png" class="img-responsive" alt="Count_me_in_logo">
          </div>
          <div class="col-xs-12">
            <label for="login-email" class="col-xs-12">E-mail</label>
            <input type="email" name="login-email" placeholder="E-mail Address" class="col-xs-12" required>
            <label for="login-password" class="col-xs-12">Password</label>
            <input type="password" name="login-password" placeholder="Password" class="col-xs-12" required>
            <button class="btn btn-primary" type="submit" name="sumbit-button">Sign in</button>
          </div>
        </form>

      </section>

    </main>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="include/js/bootstrap.min.js"></script>
    <script src="include/main.js"></script>

    <?php
    mysqli_close($connection);
     ?>
  </body>
</html>
