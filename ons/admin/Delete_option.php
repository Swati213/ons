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
  $id1=$_GET["id1"];
  mysqli_query($link,"delete from questions where id=$id ");
 
?>
<script type="text/javascript">
         window.location="add_edit_question.php?id=<?php echo $id1 ?>";
</script>
     
