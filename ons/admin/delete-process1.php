<?php
session_start();
include_once '../connnection.php';
if (!isset($_SESSION["admin"])) {
    # code...
    ?>
    <script type="text/javascript">
      window.location="../home.php";
    </script>
    <?php
  }
 $id=$_GET["id"];
 mysqli_query($link,"delete from registration where id=$id");

?>
<script type="text/javascript">
	window.location="studentdetails.php";
</script>