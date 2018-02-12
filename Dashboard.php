

<?php
include 'joins/db.php';
include "joins/config.php";

session_start();

if(!isset($_SESSION["id"]))
  header('Location:'.URL.'Index.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CountMeIn</title>

    <!-- Bootstrap -->
    <link href="include/css/bootstrap.min.css" rel="stylesheet">
    <link href="include/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
              <div id="brand">OuntMeIn</div>
            </a>
          </div>
          <div class="user-menu">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo $_SESSION['imgSrc'];?>" class="img-circle" alt="profile">
                  <span>
                    <?php
                    echo $_SESSION['name'];
                     ?>
                  </span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="row">
                      <div class="col-xs-8 col-sm-4">
                        <img src="<?php echo $_SESSION['imgSrc'];?>" class="img-circle img-responsive">
                      </div>
                      <div class="col-sm-8 col-xs-12">
                        <h5><?php echo $_SESSION['name'];?></h5>
                        <h6><?php echo $_SESSION['email'];?></h6>
                        <a href="profile.php">
                        <button class="btn btn-primary" type="button" name="button">Profile</button>
                      </a>
                      </div>
                    </div>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li><a href="joins/signout.php"><button class="btn btn-default">Sign out</button></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <button class="hidden-sm hidden-xs" type="button" id="main-search-button">
			         <i class="glyphicon glyphicon-search"></i>
		       </button>




          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">DashBoard <span class="sr-only">(current)</span></a></li>
              <li><a href="appointments.php">Appointments</a></li>
              <li><a href="#">Call Appointments</a></li>
              <li><a href="#">SMS LOGS</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
      </nav>
      <form class="navbar-form" action="search.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
          <button type="submit" class="btn btn-default">Submit</button>
   </div>
 </form>
  </header>
    <div class="container">
      <h1 class="col-sm-offset-4"><?php echo $_SESSION['name'] ?>'s DashBoard</h1>
<main>


    <section class="radius-top-right radius-top-left" id="dashBoard">
      <h2 class="title radius-top-right radius-top-left">DashBoard</h2>
      <section class="weekSection">
        <div class="row">
          <div></div>
        </div>
      </section>
      <div class="alert alert-danger">
        Mahmoud deleted his appointment
      </div>
      <div class="alert alert-warning">
        15 min to your first appointment
      </div>
    </section>

    </main>

  </div>


  <footer>
    Copyright © CountMeIn 2017-2018
  </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="include/js/bootstrap.min.js"></script>
    <script src="include/main.js"></script>

  </body>
  <?php
  mysqli_close($connection);
   ?>
</html>
