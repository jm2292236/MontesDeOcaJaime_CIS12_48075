<?php
/*
	Dr. Mark E. Lehr
	Sept 15th, 2014
	Purpose:  First for-loop
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>For Loop Table</title>
</head>

<body>
<h1>Trig Table</h1>
<?php
	//Input the data from the form
	$angStrt=$_GET['angStrt'];
	$angEnd=$_GET['angEnd'];
	$angInc=$_GET['angInc'];
?>
<table width="200" border="1">
  <tr>
  	<th>Degrees</th>
    <th>Radians</th>
    <th>Sine</th>
    <th>Cosine</th>
    <th>Tangent</th>
  </tr>
<?php
	//For - Loop
	for($angle=$angStrt;$angle<=$angEnd;$angle+=$angInc){
		echo "<tr>";
		echo "<td>$angle</td>";
		//Calculate
		$rad=number_format($angle*atan(1)/45,4);
		$sine=number_format(sin($rad),4);
		$cosine=number_format(cos($rad),4);
		$tangent=number_format(tan($rad),4);
		echo "<td>$rad</td>";
		echo "<td>$sine</td>";
		echo "<td>$cosine</td>";
		echo "<td>$tangent</td>";
		echo "</tr>";
	}
?>
</table>
</body>
</html>