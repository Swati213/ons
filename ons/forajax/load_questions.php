<?php
  session_start();
  include ('../connnection.php');
  date_default_timezone_set('Asia/Kolkata');

  $question_no="";
  $question="";
  $op1="";
  $op2="";
  $op3="";
  $op4="";
  $answer="";
  $count=0;
  $ans="";

  $queno=$_GET["questionno"];

  if(isset($_SESSION["answer"][$queno]))
  {
  	$ans=$_SESSION["answer"][$queno];
  }
  $res=mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]' && question_no=$_GET[questionno]");

  $count=mysqli_num_rows($res);

  if($count==0)
  {
    echo "over";
  }
  else
  {
     while($row=mysqli_fetch_array($res))
     {
     	$question_no=$row["question_no"];
     	$question=$row["question"];
     	$op1=$row["op1"];
     	$op2=$row["op2"];
     	$op3=$row["op3"];
     	$op4=$row["op4"];
     }

     ?>
 <br>

    <table>
    	<tr>
    		<td style="font-weight: bold;font-size: 18px;padding-left: 5px" colspan="2" >
    			<?php echo " ( ".$question_no ." ) ".$question; ?>

    		</td>
    	</tr>
    </table >
    <br>
    <table style="margin-left: 20px">
    	<tr>
    		<td>
    			<input type="radio" name="r1" id="r1" value="<?php echo $op1; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
    			<?php
            if ($ans==$op1)
           {

    	      # code...
    	      echo "checked";
         }

        ?>>
    		</td>
    		<td style="padding-left:10px ">
    			<?php
    			if(strpos($op1,'images/')!=false)
    			{
          ?>
          <img src="admin/<?php echo $op1; ?>" height="80" width="150">
          <?php
    			}
    			else
    			{
    				echo $op1;
    			}
    			?>
    			
    		</td>
    	</tr>
      <tr>
        <td>
          <input type="radio" name="r1" id="r1" value="<?php echo $op2; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
          <?php
            if ($ans==$op2)
           {

            # code...
            echo "checked";
         }

        ?>>
        </td>
        <td style="padding-left:10px ">
          <?php
          if(strpos($op2,'images/')!=false)
          {
          ?>
          <img src="admin/<?php echo $op2; ?>" height="80" width="150" style="font-size: 12px">
          <?php
          }
          else
          {
            echo $op2;
          }
          ?>
          
        </td>
      </tr>
   <tr>
        <td>
          <input type="radio" name="r1" id="r1" value="<?php echo $op3; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
          <?php
            if ($ans==$op3)
           {

            # code...
            echo "checked";
         }

        ?>>
        </td>
        <td style="padding-left:10px ">
          <?php
          if(strpos($op3,'images/')!=false)
          {
          ?>
          <img src="admin/<?php echo $op3; ?>" height="80" width="150">
          <?php
          }
          else
          {
            echo $op3;
          }
          ?>
          
        </td>
      </tr>
      <tr>
        <td>
          <input type="radio" name="r1" id="r1" value="<?php echo $op4; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
          <?php
            if ($ans==$op4)
           {

            # code...
            echo "checked";
         }

        ?>>
        </td>
        <td style="padding-left:10px ">
          <?php
          if(strpos($op4,'images/')!=false)
          {
          ?>
          <img src="admin/<?php echo $op4; ?>" height="80" width="150">
          <?php
          }
          else
          {
            echo $op4;
          }
          ?>
          
        </td>
      </tr>
    </table>
 
 <?php    
  }
 
?>