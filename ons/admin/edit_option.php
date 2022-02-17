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

  $id=$_GET["id"];
  $id1=$_GET["id1"];
  
  $question="";
  $op1="";
  $op2="";
  $op3="";
  $op4="";
  $ans="";

  $res=mysqli_query($link,"select * from  questions where id=$id");
  while ($row=mysqli_fetch_array($res)) 
  {
    $question=$row["question"];
    $op1=$row["op1"];
    $op2=$row["op2"];
    $op3=$row["op3"];
    $op4=$row["op4"];
    $ans=$row["answer"];
    
  }
?>

<div class="breadcrumbs">
     <div class="col-sm-4">
         <div class="page-header float-left">
            <div class="page-title">
              <h1>Update Question</h1>
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
                  <div class="col-lg-12">
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                 <div class="card">
                     <div class="card-header"><strong>Update Question With Text</strong>
                     </div>
                      <div class="card-body card-block">
                          <div class="form-group">
                            <label for="company" class=" form-control-label">Add Question</label>
                            <input type="text" placeholder="Add Question" class="  form-control"  name="question" value="<?php echo $question;?>">
                          </div>
                          <div class="form-group"><label for="company" class=" form-control-label">Add Option1</label>
                            <input type="text" placeholder="Add op1" class="  form-control"  name="op1" value="<?php echo $op1;?>">
                          </div>
                          <div class="form-group">
                            <label for="company" class=" form-control-label">Add Option2</label>
                            <input type="text" placeholder="Add op2" class="  form-control"  name="op2" value="<?php echo $op2;?>" >
                          </div>
                          <div class="form-group">
                            <label for="company" class=" form-control-label">Add Option3</label>
                            <input type="text" placeholder="Add op3" class="  form-control"  name="op3" value="<?php echo $op3;?>" >
                          </div>
                          <div class="form-group">
                            <label for="company" class=" form-control-label">Add Option4</label>
                            <input type="text" placeholder="Add op4" class="  form-control"  name="op4" value="<?php echo $op4;?>">
                          </div>
                          <div class="form-group">
                            <label for="company" class=" form-control-label">Add Answer</label>
                            <input type="text" placeholder="Add Answer" class="  form-control"  name="ans" value="<?php echo $ans;?>">
                          </div>
                          <div class="form-group">
                            <input type="submit" name="submit1" value="Update Question" class="btn btn-success">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div><!--/.col-->
          </div>
        </div><!-----.animated---->
      </div><!-- .content -->

  <?php
    if(isset($_POST["submit1"]))
    {
      mysqli_query($link,"Update questions set question='$_POST[question]',op1='$_POST[op1]',op2='$_POST[op2]',op3='$_POST[op3]',op4='$_POST[op4]',answer='$_POST[ans]' where id=$id ");
      ?>
       <script type="text/javascript">
         window.location="add_edit_question.php?id=<?php echo $id1 ?>";
       </script>
      <?php
    }
  ?>

 <?php
   include ('footer.php');
 ?>