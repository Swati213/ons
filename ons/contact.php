<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>

   
	<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>

    <div class="Contact-title">
    	<h1>Say Hello</h1>
    	<h2>We are always ready to serve you!</h2>
        <h4 class="sent-notification"  style="display: none;"></h4>

    </div>


<div class="myform">


	<form action="" method="POST" id="myform" role="form" >
        
		<input type="text" id="name" name="name"  class="form-control" placeholder="Your Name" required>
		<br>
       
    

		<input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
		<br>
        

		<input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
		<br>
    

		<textarea id="body" name="body" class="form-control" placeholder="Message"row="4" required></textarea>
        <br>
    
     

        <input type="submit"  onclick="sendEmail()" class="form-control submit" value="SEND MESSAGE">


	</form>
    </div>
 
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    </body>
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

</html>
<script type="text/javascript">
       
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myform')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");

                   }
                });
            }
        }
         function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else{
                caller.css('border', '');
                return true;
            }
        }
    

    </script>


