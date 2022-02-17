<?php
  session_start();
  include ('header.php');
  include ('../connnection.php');
  if (!isset($_SESSION["admin"])) {
    # code...
    ?>
    <script type="text/javascript">
      window.location="../home.php";
    </script>
    <?php
  }
?>

<div class="breadcrumbs">
     <div class="col-sm-12">
         <div class="page-header float-left">
            <div class="page-title">
              <h1>Select Exam Categories For Add & Edit Questions</h1>
            </div>
        </div>
     </div>
</div>     
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
       <div class="card">
           <div class="class-body">
              <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Batch</th>

                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam Time</th>
                                            <th scope="col">Select</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $count=0;
                                       $res=mysqli_query($link,"select * from exam_category");
                                       while($row=mysqli_fetch_array($res))
                                       {
                                        $count=$count+1;
                                          ?>
                                           <tr>
                                            <th scope="row"><?php echo $count;?></th>
                                            <td><?php echo $row["Batch"]; ?></td>

                                            <td><?php echo $row["category"]; ?></td>
                                            <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                            <td><a href="add_edit_question.php?id=<?php echo $row["id"]?>">Select</a></td>
                                           
                                        </tr>
                                        
                                          <?php
                                       }
                                      ?>
                                    </tbody>
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