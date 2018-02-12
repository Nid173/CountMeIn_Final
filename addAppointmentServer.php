
<?php
include 'joins/db.php';
if(isset($_POST['addappointment']))
{
 //update
     $pageid = 1;
    // $usrid = $_POST['usrid'];
     $date = $_POST['date'];
     $time_from_temp = $_POST['time'];
     $time_to_temp = date('H:i:s',strtotime('+1 hour',strtotime($time_from_temp)));
     $time_from = date('H:i:s',strtotime( $time_from_temp));
     $time_to = date('H:i:s',strtotime( $time_to_temp));
     $name =  $_POST['name'];
     $purpose = $_POST['purpose'];

     echo $date . $time_from . $time_to . $name . $purpose ;

     $code = "INSERT INTO `234_appointments` (usrid,pageid,date,time_from,time_to,name,purpose) VALUES
      (2, 1,'$date','$time_from' , '$time_to' ,'$name' , '$purpose');";
     $SQL=mysqli_query($connection,$code);
     if(!$SQL)
       {
        echo $connection->error;
       }



// header("Location: appointments.php");
}

?>
