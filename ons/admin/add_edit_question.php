<?php
session_start();
  include ('header.php');
  include ('../connnection.php');

  if(!isset($_SESSION["admin"])) 
  {
    # code...
    ?>
    <script type="text/javascript">
      window.location="../home.php";
    </script>
    <?php
  }

  $id=$_GET["id"];
  $exam_category='';
  $res=mysqli_query($link,"select * from exam_category where id=$id");
  while($row=mysqli_fetch_array($res)) 
  {
    $batch=$row["Batch"];
    $exam_category=$row["category"];
  }
?>

<div class="breadcrumbs">
     <div class="col-sm-6">
         <div class="page-header float-left">
            <div class="page-title">
                          <h1>Add Question inside <?php echo "<font color='red'>" .$exam_category."</font>";?> <?php echo "<font color='red'>" .$batch."</font>";?></h1>
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
              <div class="col-lg-6">
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                 <div class="card">
                     <div class="card-header"><strong>Add New Question With Text</strong>
                     </div>
                      <div class="card-body card-block">
                          <div class="form-group">
                        <label for="company" class=" form-control-label">Add Question</label>
                        <input type="text" placeholder="Add Question" class="  form-control"  name="question" >
                      </div>
                       <div class="form-group"><label for="company" class=" form-control-label">Add Option1</label>
                       <input type="text" placeholder="Add op1" class="  form-control"  name="op1" >
                      </div>
                       <div class="form-group">
                       <label for="company" class=" form-control-label">Add Option2</label>
                       <input type="text" placeholder="Add op2" class="  form-control"  name="op2" >
                      </div>
                       <div class="form-group">
                       <label for="company" class=" form-control-label">Add Option3</label>
                       <input type="text" placeholder="Add op3" class="  form-control"  name="op3" >
                      </div>
                      <div class="form-group">
                      <label for="company" class=" form-control-label">Add Option4</label>
                      <input type="text" placeholder="Add op4" class="  form-control"  name="op4" >
                      </div>
                      <div class="form-group">
                      <label for="company" class=" form-control-label">Add Answer</label>
                      <input type="text" placeholder="Add Answer" class="  form-control"  name="ans" >
                      </div>
                                    
                        <div class="form-group">
                         <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                       </div>
                    
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-6">
                <form name="form1" action="" method="post">
                 <div class="card">
                     <div class="card-header"><strong>Add New Question With Images</strong>
                     </div>
                      <div class="card-body card-block">
                          <div class="form-group">
                        <label for="company" class=" form-control-label">Add Question</label>
                        <input type="text" placeholder="Add Question" class="  form-control"  name="fquestion" >
                      </div>
                       <div class="form-group"><label for="company" class=" form-control-label">Add Option1</label>
                       <input type="file"  class="  form-control"  name="fop1" style="padding-bottom: 45px" >
                      </div>
                       <div class="form-group">
                       <label for="company" class=" form-control-label">Add Option2</label>
                       <input type="file"  class="  form-control"  name="fop2" style="padding-bottom: 45px" >
                      </div>
                      <div class="form-group">
                       <label for="company" class=" form-control-label">Add Option3</label>
                       <input type="file"  class="  form-control"  name="fop3" style="padding-bottom: 45px" >
                     </div>
                      <div class="form-group">
                      <label for="company" class=" form-control-label">Add Option4</label> 
                      <input type="file"  class="  form-control"  name="fop4"  style="padding-bottom: 45px">
                    </div>
                      <div class="form-group">
                      <label for="company" class=" form-control-label">Add Answer</label>
                      <input type="file"  class="  form-control"  name="fans" style="padding-bottom: 45px">

                      </div>
  
                        <div class="form-group">
                         <input type="submit" name="submit2" value="Add Question" class="btn btn-success">
                       </div>
                     </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div><!--/.col-->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="class-body">
                <table class="table table-bordered">
                  
                  <tr>
                    
                     <th>no</th>
                     <th>Question</th>
                     <th>Option1</th>
                     <th>Option2</th>
                     <th>Option3</th>
                     <th>Option4</th>
                     <th>Edit</th>
                     <th>Delete</th>
                   </tr>

            
                <?php
                $count=0;

                  $res=mysqli_query($link,"select * from questions where Batch='$batch' and category ='$exam_category' order by question_no asc");
                  while ($row=mysqli_fetch_array($res)) 
                  {
                     $count=$count+1;
                                   
                    echo "<tr>";
                    echo "<td>";  echo  $count; echo "</td>";

                    echo "<td>";  echo $row["question_no"]; echo "</td>";
                    echo "<td>";  echo $row["question"]; echo "</td>";
                    echo "<td>";

                    if(strpos($row["op1"],'opt_images/')!==false)
                    {
                      
                      ?>
                      <img src="<?php echo $row["op1"]; ?>" height="50" width="50">
                      <?php

                    }
                    else
                    {
                       echo $row["op1"];
                    }

                    echo "</td>";

                    echo "<td>";

                    if(strpos($row["op2"],'opt_images/')!==false)
                    {
                      
                      ?>
                      <img src="<?php echo $row["op2"]; ?>" height="50" width="50">
                      <?php

                    }
                    else
                    {
                       echo $row["op2"];
                    }

                    echo "</td>";

                    echo "<td>";

                    if(strpos($row["op3"],'opt_images/')!==false)
                    {
                      
                      ?>
                      <img src="<?php echo $row["op3"]; ?>" height="50" width="50">
                      <?php

                    }
                    else
                    {
                       echo $row["op3"];
                    }

                    echo "</td>";

                    echo "<td>";

                    if(strpos($row["op4"],'opt_images/')!==false)
                    {
                      
                      ?>
                      <img src="<?php echo $row["op4"]; ?>" height="50" width="50">
                      <?php

                    }
                    else
                    {
                       echo $row["op4"];
                    }

                    echo "</td>";

                    echo "<td>";
                      
                    if(strpos($row["op4"],'opt_images/')!==false)
                    {
                      
                      ?>
                      <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                      <?php

                    }
                    else
                    {
                       ?>
                      <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                      <?php
                    }

                    echo "</td>";

                     echo "<td>";
                      
                      ?>
                      <a href="Delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Delete</a>
                      <?php
                   

                    echo "</td>";


                    echo "</tr>";

                   
                  }
                  
                ?>
              </table>
                

              </div>
            </div>
          </div>
        </div>
      </div>
  </div><!-----.animated---->
</div><!-- .content -->
<?php
if(isset($_POST["submit1"]))
{
   $loop=0;
     $count=0;
     $res=mysqli_query($link,"select * from questions where Batch='$batch' and category='$exam_category' order by id asc") or die(mysqli_error($link));
     $count=mysqli_num_rows($res);
     
     if($count==0)
     {

     }
     else
     {
      while($row=mysqli_fetch_array($res))
      {
        $loop=$loop+1;
        mysqli_query($link,"update questions set question_no='$loop' where id=$row[id]");
      }

     }
     $loop=$loop+1;
     mysqli_query($link,"insert into questions values(NULL,'$loop','$_POST[question]','$_POST[op1]','$_POST[op2]','$_POST[op3]','$_POST[op4]','$_POST[ans]','$exam_category','$batch')") or die (mysqli_error($link));

     ?>
     <script type="text/javascript">
        alert ("question added successfully");
        window.location.href=window.location.href;
     </script>
     <?php
}
?>
<?php
if(isset($_POST["submit2"]))
{
   $loop=0;
     $count=0;
     $res=mysqli_query($link,"select * from questions where Batch='$batch'and category='$exam_category' order by id asc") or die(mysqli_error($link));
     $count=mysqli_num_rows($res);

     if($count==0)
     {

     }
     else
     {
      while($row=mysqli_fetch_array($res))
      {
        $loop=$loop+1;
        mysqli_query($link,"update questions set question_no='$loop' where id=$row[id]");
      }

     }
     $loop=$loop+1;

     $tm=md5(time());

     $fnm1=$_FILES["fop1"]["name"];
     $dst1="./opt_images/".$tm.$fnm1;
     $dst_db1="opt_images/".$tm.$fnm1;
     move_uploaded_file($_FILES["fop1"]["tmp_name"],$dst1);

     $fnm2=$_FILES["fop2"]["name"];
     $dst2="./opt_images/".$tm.$fnm2;
     $dst_db2="opt_images/".$tm.$fnm2;
     move_uploaded_file($_FILES["fop2"]["tmp_name"],$dst2);

     $fnm3=$_FILES["fop3"]["name"];
     $dst3="./opt_images/".$tm.$fnm3;
     $dst_db3="opt_images/".$tm.$fnm3;
     move_uploaded_file($_FILES["fop3"]["tmp_name"],$dst3);

     $fnm4=$_FILES["fop4"]["name"];
     $dst4="./opt_images/".$tm.$fnm4;
     $dst_db4="opt_images/".$tm.$fnm4;
     move_uploaded_file($_FILES["fop4"]["tmp_name"],$dst4);

     $fnm5=$_FILES["fans"]["name"];
     $dst5="./opt_images/".$tm.$fnm5;
     $dst_db5="opt_images/".$tm.$fnm5;
     move_uploaded_file($_FILES["fans"]["tmp_name"],$dst5);





     mysqli_query($link,"insert into questions values(NULL,'$loop','$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$exam_category','$batch')") or die (mysqli_error($link));

     ?>
     <script type="text/javascript">
        alert ("question added successfully");
        window.location.href=window.location.href;
     </script>
     <?php
}
?>


 <?php
   include ('footer.php');
 ?>