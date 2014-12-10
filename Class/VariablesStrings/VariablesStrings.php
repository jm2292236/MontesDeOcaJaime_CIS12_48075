<?php
   /*
   		Jaime Montes de Oca
		August 27th, 2014
		Purpose:  Comments/Variables/Strings
   */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Strings and Variables</title>
</head>

<body>
	<?php
		//Declare variables
		$hours=40;//Worked 40 hours
		$payRate=9;//$'s/hour
		//Calculate the paycheck
		$grossPay=$hours*$payRate;
		//Output the result
		echo "<p>Hours worked = $hours (hrs)</p>";
		echo '<p>Pay Rate = $$payRate</p>';
		echo "<p>Pay check = $".$grossPay.'</p>';
	?>
</body>
</html>
