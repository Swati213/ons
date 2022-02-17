<?php
session_start();
  include ('header.php');
  include ('../connnection.php');
  if(!isset($_SESSION["admin"])) {
    # code...
    ?>
    <script type="text/javascript">
      window.location="../home.php";
    </script>
    <?php
             
  }
?>

<div class="breadcrumbs">
     <div class="col-sm-4">
         <div class="page-header float-left">
            <div class="page-title">
              <h1>All Exam Results</h1>
            </div>
        </div>
     </div>
</div>     
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
       <div class="card">
           <div class="card-body">
              <center>
                           <h1 style="color: #e53935" >Old Exam Results</h1>

             </center>
           <?php
             $res=mysqli_query($link,"select * from exam_results  order by id desc");
             $count=mysqli_num_rows($res);
             if($count==0)
             {
              ?>
                <center><h1 style="color: #fdd835">No Results Found</h1></center>
             
              <?php
             }
             
            else
            {
            ?> 
              <table class='table table-bordered'>
              <tr style='background-color:#1de9b6;color:white'>
              <td>username</td>
              <td>Batch</td>
               <td>exam_type</td>
               <td>total_question</td>
               <td>correct_answer</td>
               <td>wrong_answer</td>
              <td>exam_time</td>
              <td>Action</td>
  
           </tr>
           <?php
   
                         
  while($row = mysqli_fetch_array($res)) {
  ?>
  <tr style='background-color:#c51162;color:white'>
  <td><?php echo $row["username"]; ?></td>
  <td><?php echo $row["Batch"]; ?></td>
  <td><?php echo $row["exam_type"]; ?></td>
  <td><?php echo $row["total_question"]; ?></td>
  <td><?php echo $row["correct_answer"]; ?></td>
    <td><?php echo $row["wrong_answer"]; ?></td>
  <td><?php echo $row["exam_time"]; ?></td>

  <td><a href="delete-process.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
  </tr>
  <?php
  
   }
 }
    ?>
  </table>
           </div>
      </div>
    </div><!--/.col-->
  </div>
</div><!-----.animated---->
</div><!-- .content -->
 <?php
   include ('footer.php');
 ?>