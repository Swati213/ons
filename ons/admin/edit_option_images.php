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
              <h1>Update Question with images</h1>
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
                     <div class="card-header"><strong>Add New Question With Images</strong>
                     </div>
                      <div class="card-body card-block">
                          <div class="form-group">
                        <label for="company" class=" form-control-label">Add Question</label>
                        <input type="text" placeholder="Add Question" class="  form-control"  name="fquestion" value="<?php echo $question;?>">
                      </div>
                       <div class="form-group">

                        <img src="<?php echo $op1; ?>" height="100" width="100"><br>

                        <label for="company" class=" form-control-label">Add Option1</label>
                       <input type="file"  class="  form-control"  name="fop1" style="padding-bottom: 45px"  >
                      </div>
                       <div class="form-group">
                        <img src="<?php echo $op2; ?>" height="100" width="100"><br>

                       <label for="company" class=" form-control-label">Add Option2</label>
                       <input type="file"  class="  form-control"  name="fop2" style="padding-bottom: 45px"  >
                      </div>
                      <div class="form-group">
                        <img src="<?php echo $op3; ?>" height="100" width="100"><br>

                       <label for="company" class=" form-control-label">Add Option3</label>
                       <input type="file"  class="  form-control"  name="fop3" style="padding-bottom: 45px" >
                     </div>
                      <div class="form-group">
                        <img src="<?php echo $op4; ?>" height="100" width="100"><br>

                      <label for="company" class=" form-control-label">Add Option4</label> 
                      <input type="file"  class="  form-control"  name="fop4"  style="padding-bottom: 45px" >
                    </div>
                      <div class="form-group">
                        <img src="<?php echo $ans; ?>" height="100" width="100"><br>

                      <label for="company" class=" form-control-label">Add Answer</label>
                      <input type="file"  class="  form-control"  name="fans" style="padding-bottom: 45px" >

                      </div>
  
                        <div class="form-group">
                         <input type="submit" name="submit2" value="Update Question" class="btn btn-success">
                       </div>
                     </div>
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
 if(isset($_POST["submit2"])) 
 {
   $op1=$_FILES["fop1"]["name"];
   $op2=$_FILES["fop2"]["name"];
   $op3=$_FILES["fop3"]["name"];
   $op4=$_FILES["fop4"]["name"];
   $ans=$_FILES["fans"]["name"];

   $tm=md5(time());

     
     
    
    if($op1!="")
    {
     

     $dst1="./opt_images/".$tm.$op1;
     $dst_db1="opt_images/".$tm.$op1;
     move_uploaded_file($_FILES["fop1"]["tmp_name"],$dst1);

     mysqli_query($link,"Update questions set question='$_POST[fquestion]',op1='$dst_db1' where id=$id ") or die (mysqli_error($link));


    }
    if($op2!="")
    {
     

     $dst2="./opt_images/".$tm.$op2;
     $dst_db2="opt_images/".$tm.$op2;
     move_uploaded_file($_FILES["fop2"]["tmp_name"],$dst2);

     mysqli_query($link,"Update questions set question='$_POST[fquestion]',op1='$dst_db2' where id=$id ") or die (mysqli_error($link));


    }
    if($op3!="")
    {
     

     $dst3="./opt_images/".$tm.$op3;
     $dst_db3="opt_images/".$tm.$op3;
     move_uploaded_file($_FILES["fop3"]["tmp_name"],$dst3);

     mysqli_query($link,"Update questions set question='$_POST[fquestion]',op3='$dst_db3' where id=$id ") or die (mysqli_error($link));


    }
    if($op4!="")
    {
     

     $dst4="./opt_images/".$tm.$op4;
     $dst_db4="opt_images/".$tm.$op4;
     move_uploaded_file($_FILES["fop4"]["tmp_name"],$dst4);

     mysqli_query($link,"Update questions set question='$_POST[fquestion]',op4='$dst_db4' where id=$id ") or die (mysqli_error($link));


    }
    if($ans!="")
    {
     

     $dst5="./opt_images/".$tm.$ans;
     $dst_db5="opt_images/".$tm.$ans;
     move_uploaded_file($_FILES["fans"]["tmp_name"],$dst5);

     mysqli_query($link,"Update questions set question='$_POST[fquestion]', answer='$dst_db5' where id=$id ") or die (mysqli_error($link));


    }
         mysqli_query($link,"Update questions set question='$_POST[fquestion]' where id=$id ") or die (mysqli_error($link));

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