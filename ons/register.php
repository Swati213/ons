<?php

//register.php

include('connnection.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

       <link rel="stylesheet" href="css1/bootstrap.min.css">
       <link rel="stylesheet" href="css1/font-awesome.min.css">
      <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
      <link rel="stylesheet" href="css1/animate.css">
      <link rel="stylesheet" href="css1/normalize.css">
      <link rel="stylesheet" href="css1/main.css">
      <link rel="stylesheet" href="css/style1.css">
      <link rel="stylesheet" type="text/css" href="css/style4.css">
       <link rel="stylesheet" href="css1/responsive.css">
      <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item ">
        <a  class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/index.php">Admin Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contct us</a>
      </li>
    <ul class="nav nav-tabs" >
      <li class="nav-item active">
        <a  class="nav-link" href="#">Register <span class="sr-only">(current)</span></a>
      </li>
      </ul>
     
          
    </ul>
   
  </div>

</nav>

 
  <div class ="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center custom-login">
        <img src="images/1.jpeg" class="img-fluid" width="300" alt="Online Examination System " />
 
           <h3>register</h3>
         </div>
 
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <form action="" name="form1" method="post">
              <div class="row">
                <div class="form-group col-lg-12">
                    <label>Firstname</label>
                    <input type="text" name="firstname" class="form-control">
                  </div>
                  <div class="form-group col-lg-12">
                    <label>Lastname</label>
                    <input type="text" name="lastname" class="form-control">
                  </div>
                 <div class="form-group col-lg-12">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                  </div>
                <div class="form-group col-lg-12">
                    <label>Password</label>
                    <input type="Password" name="password" class="form-control">
                  </div>
                <div class="form-group col-lg-12">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                  </div>
                <div class="form-group col-lg-12">
                    <label>Contact</label>
                    <input type="text" name="contact" class="form-control">
                  </div>
                  <div class="form-group col-lg-12">
                    <label>Collage</label>
                    <input type="text" name="collage" class="form-control">
                  </div>
                <div class="form-group col-lg-12">
                    <label>Batch</label>
                    <input type="text" name="batch" class="form-control">
                  </div>
                
                </div>
                <div class="text-center">
                  <button type="submit" name="submit1" class="btn btn-success loginbtn">Register</button>
                </div>
                <div class="alert alert-success"id="success" style="margin-top: 10px; display:none">
                   <strong>Success!</strong> Account Registration Successfully.
                </div>
                <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                   <strong>Already Exist!</strong> This Username is Already Exist.
                </div>
     
              </form>
            </div>
          </div>
        </div>
        </div>
        </div>
      </div>
<?php
if(isset($_POST["submit1"]))
{
  $count=0;
  $res=mysqli_query($link,"select * from registration where Username='$_POST[username]'") or die(mysqli_error($link));
  $count=mysqli_num_rows($res);

  if($count>0)
  {
    ?>
    <script type="text/javascript">
               document.getElementById("success").style.display="none";
               document.getElementById("failure").style.display="block";
    </script>
    <?php
  }
  else
  {
    mysqli_query($link,"insert into registration values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','$_POST[collage]','$_POST[batch]')");
    ?>
    <script type="text/javascript">
         document.getElementById("success").style.display="block";
         document.getElementById("failure").style.display="none";

    </script>
    <?php

  }
  }
?>  
 <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2020.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>


