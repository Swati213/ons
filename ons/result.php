<?php
  session_start();
  if(!isset($_SESSION["username"]))
{

    ?>
    <script type="text/javascript">
        window.location="home.php";
    </script>
    <?php

}
  include ('connnection.php');
  
  date_default_timezone_set('Asia/Kolkata');

  $date=date("Y-m-d H:i:s");
  $_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date ."+ $_SESSION[exam_time] minutes"));
  
  include "header2.php";
   
?>       
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
              <br>
            <center><h4 style="color: black">Result</h4></center>
            	<?php
            	$correct=0;
            	$wrong=0;

            	if(isset($_SESSION["answer"]))
            	{
            		for ($i=1; $i <=sizeof($_SESSION["answer"]); $i++) { 

            			# code...
            			$answer="";
            			$res=mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]' &&  question_no=$i");
            			while ($row=mysqli_fetch_array($res)) 
            			{
            				# code...
            				$answer=$row["answer"];
            			}
            			if (isset($_SESSION["answer"][$i]))
            			 {
            				# code...
            				if ($answer==$_SESSION["answer"][$i]) 
            				{
            					# code...
            					$correct=$correct+1;

            				}
            				else
            				{
            					$wrong=$wrong+1;
            				}
            			}
            			else
            			{
            				$wrong=$wrong+1;
            			}
            		}
            	}

                 $count=0;
                 $res=mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]'");
                 $count=mysqli_num_rows($res);
                 $wrong=$count-$correct;
                 
            	?>
              <table style="border:1px solid black;border-collapse:collapse;margin-left:auto;margin-right:auto; width:100%;background-color: #f1f1c1;position: absolute;left: 0%;">
                <tr>
                  <th>No Of Questions</th>
                  <th>Corrrect Answer</th>
                  <th>Wrong Answer</th>
                  <th>Time</th>
                </tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $correct; ?></td>
                <td><?php echo $wrong; ?></td>
                <td><?php echo $date;?></td>

              </table>
            </div>

        </div>

<?php
  if(isset($_SESSION["exam_start"]))
  {
  	$date=date("Y-m-d");
  	mysqli_query($link,"insert into exam_results(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')");
  }
  if (isset($_SESSION["exam_start"]))
   {
  	# code...
  	unset($_SESSION["exam_start"])
  	?>
  	<script type="text/javascript">
  		window.location.href=window.location.href;
  	</script>
  	<?php
  }
?>
<?php
 include "footer.php";
?>


       