<?php
 session_start();
 include "../connnection.php";
 date_default_timezone_set('Asia/Kolkata');

 $total_que=0;
 $res1=mysqli_query($link,"select * from questions	where category='$_SESSION[exam_category]'");
 $total_que=mysqli_num_rows($res1);
 echo $total_que;
?>