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
<title>For Loop Table with Arrays</title>
</head>

<body>
<h1>Trig Table</h1>
<?php
	//Input the data from the form
	$angStrt=$_GET['angStrt'];
	$angEnd=$_GET['angEnd'];
	$angInc=$_GET['angInc'];
	//Declare the arrays
	$degree=array();
	$radians=array();
	$sine=array();
	$cosine=array();
	$tangent=array();
	//Calculations for each parallel array
	for($angle=$angStrt;$angle<=$angEnd;$angle+=$angInc){
		//Calculate
		$degree[$angle]=$angle;
		$radian[$angle]=number_format($angle*atan(1)/45,4);
		$sine[$angle]=number_format(sin($radian[$angle]),4);
		$cosine[$angle]=number_format(cos($radian[$angle]),4);
		$tangent[$angle]=number_format(tan($radian[$angle]),4);
	};
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
		echo "<td>".$degree[$angle]."</td>";
		echo "<td>".$radian[$angle]."</td>";
		echo "<td>".$sine[$angle]."</td>";
		echo "<td>".$cosine[$angle]."</td>";
		echo "<td>".$tangent[$angle]."</td>";
		echo "</tr>";
	};
?>
</table>
<?php
	echo "<p>The number of elements in the columns are ".count($degree)."</p>";
?>
</body>
</html>