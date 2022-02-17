<?php
session_start();
 include ('../connnection.php');
 if (!isset($_SESSION["admin"])) {
    # code...
    ?>
    <script type="text/javascript">
      window.location="../home.php";
    </script>
    <?php
  }
 $id=$_GET["id"];
 mysqli_query($link,"delete from exam_category where id=$id");

?>
<script type="text/javascript">
	window.location="exam_category.php";
</script>