<?php
include 'joins/db.php';
include "joins/config.php";
include 'appointmentsServer.php';

session_start();

if(!isset($_SESSION["id"]))
  header('Location:'.URL.'index.php');

define("START_TIME","09:00:00");
if(isset($_GET['show'])){
  $show = $_GET['show'];
  if($show==0){

  }
}


  $result=mysqli_query($connection,"SELECT * FROM 234_appointments WHERE pageid='"
  .$_SESSION['id']
  ."'and date='".$_GET[date]."'");
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
            <li><a href="DashBoard.php?id=<?php echo $_SESSION['id'];?>">DashBoard <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="appointments.php?date=2018-02-12">Appointments</a></li>
            <li><a href="#">Call Appointments</a></li>
            <li><a href="#">SMS LOGS</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
    </nav>
    <form class="navbar-form" action="search.php" method="get">
      <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search Name">
        <button type="submit" class="btn btn-default">Submit</button>
 </div>
</form>
</header>
<div class="container">
   <h1 class="col-sm-offset-4 title-line"><?php echo $_SESSION['name'] ?>'s Appointments</h1>
  <div class="row"><!-- Main row -->

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

   <div id="mySidenav" class="sidenav"> <!--MobileSideBar -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Add appointment</a>
  <a href="#">Cancel appointment</a>
  <a href="#">Rate appointment</a>
</div>
      <div class="col-md-8 col-sm-8 col-xs-12"><!-- Main content  -->
        <div class="title radius-top-right bottom-border-none">
          <div class="side-burger col-xs-3 visible-xs" onclick="openNav()"> </div>
          <div class="whiteLine80">
            <span class="glyphicon glyphicon-triangle-left"></span>
            <?php echo $_GET['date'];?>
            <span class="glyphicon glyphicon-triangle-right"></span>
          </div>

          <form id="appointments-form" class="horizontal" action="appointments.php" method="get">
            <div class="form-group">
              <div class="input-group">
                <input type="date" name="date" class="form-control" value="<?php echo $_GET['date'];?>">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>

        </div>


        <div class=" WindowContent radius-bottom-left table-responsive"> <!-- TABLE  -->

          <!--                                TABLE -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Time</th>
                <th scope="col">Purpose</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              <?php while ($row = mysqli_fetch_array($result)) {
                if ($row["name"] == 'UnplannedTime') {?>
                            <tr>
                             <td  class="alert-warning">
                             &nbsp;<span class="glyphicon glyphicon-warning-sign alert-warning"></span>
                             </td>
                             <td class="alert-warning"> UnplannedTime </td>
                             <td class="alert-warning"> <?php echo date('g:i', strtotime($row["time_from"])) . "-" . date('g:i', strtotime($row["time_to"]))?> </td>
                             <td Colspan="" class="alert-warning">
                             <a href="?Break=<?php echo $row['time_to']; ?>">
                             <button  type="button" class="btn btn-success ">Mark as break</button>
                             </a>
                             <button type="button" class="btn btn-primary disabled">Set appointment</button> </td>
                             <td class="alert-warning"> </td>
                            </tr>
              <?php
            } else if ($row["name"] == 'Break') { ?>
              <tr>
                         <td  class="alert-success">
                             &nbsp;<span class="glyphicon glyphicon-ok alert-success"></span>
                         </td>
                         <td class="alert-success"> Break </td>
                         <td class="alert-success"> <?php echo date('g:i', strtotime($row["time_from"])) . "-" . date('g:i', strtotime($row["time_to"]))?> </td>
                         <td class="alert-success"> </td>
                         <td class="alert-success">
                           <a href="?UnplannedTime=<?php echo $row['time_to']; ?>">
                           <span class="glyphicon glyphicon-remove alert-success"></span>
                         </a>
                         </td>
                        </tr>
            <?php } else { ?>

                 <tr>
                    <td scope="row" ><div  class="toggle"></div></td>
                    <td ><?php echo $row["name"] ?></td>
                    <td ><?php echo date('g:i', strtotime($row["time_from"])) . "-" . date('g:i', strtotime($row["time_to"]))?></td>
                    <td ><?php echo $row["purpose"] ?></td>
                    <td >

<div class="dropdown">
<button class="btn dropdown-toggle glyphicon glyphicon-cog" type="button" data-toggle="dropdown">
<span class="caret"></span></button>
<ul class="dropdown-menu">
<li><a href="?UnplannedTime=<?php echo $row['time_to']; ?>">Delete</a></li>
<li><a href="#">Modify</a></li>
<li class="disabled"><a href="#">Rate</a></li>
</ul>
</div>


                  </td>
                 </tr>
                 <tr class="showContent hiddenStyle"><td Colspan="5">
                   <div class="col-xs-1">
                   <img src="<?php echo $_SESSION['imgSrc'];?>" class="img-responsive" alt="profile">
                 </div>
                   <span>
                     <?php
                     echo $_SESSION['name'];
                      ?>
                   </span>

                </td></tr><tr></tr>
               <?php } } ?>
              <!--                              This will be filled by Main.js -->
            </tbody>
          </table>

        </div>

      </div>

</div> <!-- /.Main row -->

<main>
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
<script src="include/getfreetime.js"></script>

</body>

</html>
<?php
mysqli_close($connection);
 ?>
