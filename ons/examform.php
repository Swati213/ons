<?php
session_start();
include "connnection.php";
  include "header2.php";
  if(!isset($_SESSION["username"]))
{

    ?>
    <script type="text/javascript">
        window.location="home.php";
    </script>
    <?php

}
if($_SERVER['REQUEST_METHOD']=='POST')
                 {
                 	$_SESSION['batch']=$_POST['batch'];
                 	if($_SESSION['batch']){
                 		header('location:select_exam.php');
                 	}
                 }



?>       
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
       <br>
            	<br>
            	<center>           
            	 <p style="font-weight: bold;font-size: 26px;color:black"> Please fill the form for the process of examination!</p>
            </center>
  
            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
            	  <br>
              <br>
              	<form action="examform.php" name="form1" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="username">Collage</label>
                                <input type="text" placeholder="collage" title="Please enter your collage name" required="" name="collage" id="collage" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Batch</label>
                                <input type="text" title="Please enter your batch" placeholder="Batch" required="" value="" name="batch" id="batch" class="form-control">

                            </div>
                             <div class="form-group">
                                <label class="control-label" for="password">Rollno</label>
                                <input type="text" title="Please enter your password" placeholder="4566" required="" value="" name="rollno" id="rollno" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Enrollno</label>
                                <input type="text" title="Please enter your password" placeholder="67789" required="" value="" name="enrollno" id="enrollno" class="form-control">

                            </div>
                             
                           

                            <button  type="submit" name="submit1" class="btn btn-success btn-block loginbtn">Submit</button>
                           <div class="alert alert-success"id="success" style="margin-top: 10px; display:none">
                   <strong>Success!</strong> Form Submitted.
                </div>
                <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                   <strong>Already Exist!</strong>Please check your form .
                </div>
       
                       </form>
                       </div>

        </div>
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into examform values(NULL,'$_SESSION[username]','$_POST[collage]','$_POST[batch]','$_POST[rollno]','$_POST[enrollno]')") or die(mysqli_error($link));

   ?>
    <script type="text/javascript">
         document.getElementById("success").style.display="block";
         document.getElementById("failure").style.display="none";
    </script>
    <?php


}
?>

<?php
 include "footer.php";
?>


