<?php
include 'joins/db.php';
include "joins/config.php";
include 'appointmentsServer.php';

session_start();

if(!isset($_SESSION["id"]))
  header('Location:'.URL.'index.php');
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
            <li><a href="Dashboard.php">DashBoard <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="appointments.php">Appointments</a></li>
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

    <main>
      <div class="container">
        <div class="row"><!-- Main row -->
          <ul class="breadcrumb">
            <li><a href="#">page</a></li>
            <li><a href="apointments.php">appointments</a></li>
            <li class="active">add-apointment</li>
          </ul>
        <h1 class="col-sm-offset-4 title-line"> Add appointment</h1>

         <div class="col-md-offset-1 col-md-3 col-sm-4 hidden-xs"><!-- SideBar menu -->
           <div class="row title radius-top-left bottom-border-none">
             <div class="whiteLine80">
               Options
             </div>
           </div>
           <div class="row WindowContent radius-bottom-right">
             <ul>
               <li><a href="addApointment.php"><span class="glyphicon">&#xe081;</span>Add appointment</a></li>
               <li><a href="#"><span class="glyphicon">&#xe082;</span>Cancel appointment</a></li>
               <li><a href="#"><span class="glyphicon">&#xe006;</span>Rate appointment</a></li>
             </ul>
           </div>
         </div><!-- /. SideBar menu -->

          <!--Form Start Here with title -->
          <div class="col-md-7 col-sm-8 col-xs-12 radius-top-right WindowContent ">
            <div class="col-xs-12 title radius-top-right">
              <div id="button-side-menu" class="col-xs-2">
                <span class="glyphicon" style="cursor:pointer" onclick="openNav()">&#xe258;&#xe258;</span>
              </div>
              <div class="whiteLine80">
                  Set appointment info
              </div>
            </div>

            <!-- Form content starts Here -->
            <div class="col-xs-12">
              <form action="addAppointment-sucess.html" id="addappointment-form">

              <div class="form-group row">
                <label for="customer_name" class="col-md-3 col-xs-12 col-md-offset-1">Customer:</label>
                <div class="col-md-6 col-xs-12">
                  <input class="form-control" name="cutomer_name" type="text" placeholder="Costumer's Profile Name" required >
                </div>
              </div>

              <div class="form-group row ">
                <label for="date" class="col-md-3 col-xs-12 col-md-offset-1">Date:</label>
                <div class="col-md-6 col-xs-12">
                  <div class="input-group date">
                    <input name="date" type="date" class="form-control">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-xs-11 col-xs-offset-1 whiteLine80">
              </div>

              <div class="form-group row">
                <label for="purpose_select" class=" col-md-3 col-xs-10 col-md-offset-1">Purpose:
                </label>
                <div class="col-md-6 col-xs-12">
                  <input checked type="radio" class="inline-radio" name="purpose_radio">
                  <select class="form-control" id="purpose_select" name="purpose_select" title="Options">
                    <option>Kill</option>
                    <option>ghi</option>
                  </select>
                </div>
              </div>


              <div class="form-group row">
                <label class="radio-inline col-md-3 col-xs-10 col-md-offset-4 otherRadio">
                  <input type="radio" name="purpose_radio">Other</label>
                <div class="col-md-6 col-md-offset-4 col-xs-12">
                  <div class="form-group row" id="otherPurpose">
                    <label class="col-md-3 col-xs-12">Purpose:</label>
                    <div class="col-md-9 col-xs-12">
                      <input class="form-control" type="text" placeholder="custom" name="custom_purpose">
                    </div>

                    <label for="purpose_description" class="col-xs-12">description:</label>
                    <textarea class="form-control" rows="4" id="purpose_description"></textarea>

                      <label class="checkbox-inline"><input type="checkbox" value="">save the information as a new purpose.</label>
                  </div>

                </div>
              </div>
              <div class="col-sm-offset-7 col-xs-offset-2 ">
                <button type="submit"  class="btn btn-success">set appointment</button>
                <button type="button" class="btn btn-danger ">Cancel</button>

              </div>

            </form>
          </div>

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
