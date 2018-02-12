



<?php
include 'joins/db.php';
include "joins/config.php";

$sql = "
insert into users_234 (id, name, email, password, imgSrc ) values
 (1, 'pazita', 'pazita@gmail.com', 'pazita123', 'images/pazita.jpg')
, (2, 'ans', 'ans@gmail.com', 'ans123', 'images/ans.jpg')
, (3, 'dani', 'dani@gmail.com', 'dani123', 'images/dani.jpg')
, (4, 'natalie', 'natalie@gmail.com', 'natalie123', 'images/natalie.jpg')
, (5, 'majd', 'majd@gmail.com', 'majd123', 'images/majd.jpg')
, (6, 'jeries', 'jeries@gmail.com', 'jeries123', 'images/jeries.jpg')
, (7, 'mansour', 'mansour@gmail.com', 'mansour123', 'images/mansour.jpg')
, (8, 'we', 'we@gmail.com', 'we123', 'images/we.jpg')
, (9, 'are', 'are@gmail.com', 'are123', 'images/are.jpg')
, (10, 'sostressed', 'sostressed@gmail.com', 'sostressed123', 'images/sostressed.jpg');

";
$SQL=mysqli_query($connection,$sql);
// $run=mysqli_query($connection,$sql);
if(!$SQL)
{
 echo "ERROR: " . $connection->error;
}
echo "<br>";
