<?php
	/*
		Jaime Montes de Oca
		August 27th, 2014
		This is how to put comments on php programs
		Purpose: Comments about variables and strings
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
		// Declare variables
		$hours=40; // Worked 40 hours
		$payRate=9; // $'s per hour
		
		// Calculate te paycheck
		$grossPay=$hours*$payRate;
		
		// Output the result
		echo "<p>Hours worked = $hours (hours)</p>";
		echo '<p>Pay Rate = $$payRate</p>';
		echo "<p>Pay Check = $".$grossPay.'</p>';
		
		// This is the last line
	?>
    
</body>
</html>