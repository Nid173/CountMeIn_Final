<?php
if(isset($_GET['Break']))
{
  // $sql= " UPDATE `234_appointments` SET name=Break where time_to=.$_GET['Break']";
  $Breakit=$_GET['Break'];
   $SQL=mysqli_query($connection,"UPDATE `234_appointments` SET name='Break' WHERE time_to='$Breakit'");
  // $run=mysqli_query($connection,$sql);
  if(!$SQL)
  {
    echo "ERROR: " . $connection->error;
  }
}
if(isset($_GET['UnplannedTime']))
{
  // $sql= " UPDATE `234_appointments` SET name=Break where time_to=.$_GET['Break']";
  $Unplannit=$_GET['UnplannedTime'];
   $SQL=mysqli_query($connection,"UPDATE `234_appointments` SET name='UnplannedTime' WHERE time_to='$Unplannit'");
  // $run=mysqli_query($connection,$sql);
  if(!$SQL)
  {
    echo "ERROR: " . $connection->error;
  }
}




?>
