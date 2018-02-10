

<?php
include 'joins/db.php';
include "joins/config.php";

session_start();

if(!isset($_SESSION["id"]))
  header('Location:'.URL.'Index.php');

  $query = "SELECT * FROM users_234 WHERE id = '". $_SESSION['id'] ."' ";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);
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


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:100,700,400" rel="stylesheet">
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
            <a class="navbar-brand" href="dashBoard.php">
              <div id="brand">OuntMeIn</div>
            </a>
          </div>
          <div class="user-menu">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <img src="images/<?php echo $row['profileImg'];?>.png " class="img-circle" alt="profile">
                  <span>
                    <?php
                    echo $row['name'];
                     ?>
                  </span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="row">
                      <div class="col-xs-8 col-sm-4">
                        <img src="images/<?php echo $row['profileImg'];?>.png " class="img-circle img-responsive">
                      </div>
                      <div class="col-sm-8 col-xs-12">
                        <h5><?php echo $row['name']; ?></h5>
                        <h6><?php echo $row['email']; ?></h6>
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
              <li><a href="dashBoard.php">DashBoard <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Appointments</a></li>
              <li><a href="#">Call Appointments</a></li>
              <li><a href="#">SMS LOGS</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
      </nav>
      <form class="navbar-form">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
          <button type="submit" class="btn btn-default">Submit</button>
   </div>
 </form>
  </header>

	<main>
		<div class="container">
			<div class="row">
				<h1 class="col-sm-offset-4"><?php echo $row['name'] ?>'s Profile</h1>
        <button type="button" name="edit-profile">
          <span class="glyphicon glyphicon-edit"></span>
        </button>
			<section class="col-sm-2 col-sm-offset-1 col-xs-12">
				<h2>Pages</h2>
			</section>

			<section id="profile-content" class="col-xs-12 col-sm-7 col-sm-offset-1">
        <form class="form-horizontal" action="#" method="post">
          <fieldset disabled>

            <div class="col-xs-3">
    					<img class="img-circle img-responsive" src="images/pazita1.png">
    					<div id="stars" class="starrr"></div>
    				  </div>
            <div class="col-sm-8">
              <h2>About</h2>
              <div class="form-group">
              <textarea class="form-control">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </textarea>
            </div>
            </div>


            <div class="col-sm-8 col-sm-offset-3">
              <h2>Basic information</h2>
              <div class="form-group">
              <label class="control-label col-xs-4" for="birth-date">Birthday:</label>
              <div class="col-xs-7">
                <input class="form-control col-xs-7" type="date" name="birth-date">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-xs-4" for="gender">Gender:</label>
              <div class="col-xs-7">
              <input class="form-control col-xs-7" list="gender-option" name="gender" value="female">
              <datalist id="gender-option">
                <option value="male">
                <option value="female">
              </datalist>
            </div>
          </div>

            </div>

            <div class="col-sm-8 col-sm-offset-3">
                <h2>Contact</h2>
                <div class="form-group">
                  <label class="control-label col-xs-4" for="phone">
                    <i class="	glyphicon glyphicon-earphone"></i>
                  </label>
                  <div class="col-xs-7">
                    <input class="form-control col-xs-7" type="phone" name="phone" value="0527689234">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </fieldset>
        </form>
        </section>


		</div>
		</div>
	</main>
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
