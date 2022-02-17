
<?php
session_start();
  include ('header.php');
  include('../connnection.php');
  if (!isset($_SESSION["admin"])) {
    # code...
    ?>
    <script type="text/javascript">
      window.location="../home.php";
    </script>
    <?php
  }
  $id=$_GET["id"];
  $res=mysqli_query($link,"select * from exam_category where id=$id");
  while($row=mysqli_fetch_array($res))
  {
    $batch=$row["Batch"];
    $exam_category=$row["category"];
    $exam_time=$row["exam_time_in_minutes"];

  }
?>


<div class="breadcrumbs">
     <div class="col-sm-4">
         <div class="page-header float-left">
            <div class="page-title">
              <h1>Edit Exam</h1>
            </div>
          </div>
     </div>
 </div>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
       <div class="card">
        <form name="form1" action="" method="post">
          <div class="class-body">
           <div class="col-lg-6">
               <div class="card">
                  <div class="card-header"><strong>Edit Exam Categories</strong>
                  </div>
                    <div class="card-body card-block">
                       <div class="form-group">
                        <label for="company" class=" form-control-label">New Batch</label> 
                        <input type="text" placeholder="Add Batch" class="  form-control"  name="batch" value="<?php echo $batch;?>">
                      </div>
                     
                      <div class="form-group">
                        <label for="company" class=" form-control-label">New Exam Category</label> 
                        <input type="text" placeholder="Add Exam category" class="  form-control"  name="examname" value="<?php echo $exam_category;?>">
                      </div>
                        <div class="form-group">
                          <label for="vat" class=" form-control-label">Exam Time In Minutes</label>
                          <input type="text"  placeholder="Exam time in Minutes" class="form-control"name="examtime" value="<?php echo $exam_time;?>">
                        </div>
                        <div class="form-group">
                         <input type="submit" name="submit1" value="Update exam" class="btn btn-success">
                       </div>
                    
                      </div>
                 </div>
               </div>
          </div>
           </form>       
      </div>
  </div><!--/.col-->
</div><!-- .content -->

<?php
  if(isset($_POST["submit1"]))
  {
    mysqli_query($link,"Update exam_category set Batch='$_POST[batch]', category='$_POST[examname]' ,exam_time_in_minutes='$_POST[examtime]' where id=$id") or die(mysqli_error($link));
    ?>
      <script type="text/javascript">
      
        window.location.href="exam_category.php";
      </script>
    <?php
  }
?>
 <?php
   include ('footer.php');
 ?>