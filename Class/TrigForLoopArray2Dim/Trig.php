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
<title>For Loop Table with Arrays 2-Dim</title>
</head>

<body>
<h1>Trig Table</h1>
<?php
	//Input the data from the form
	$angStrt=$_GET['angStrt'];
	$angEnd=$_GET['angEnd'];
	$angInc=$_GET['angInc'];
	//Declare the arrays
	$trigTab=array();
	for($col=1;$col<=5;$col++){
		$trigTab[$col]=array();
	}
	//Calculations for each parallel array
	for($angle=$angStrt;$angle<=$angEnd;$angle+=$angInc){
		//Calculate
		$trigTab[1][$angle]=$angle;
		$trigTab[2][$angle]=number_format($angle*atan(1)/45,4);
		$trigTab[3][$angle]=number_format(sin($trigTab[2][$angle]),4);
		$trigTab[4][$angle]=number_format(cos($trigTab[2][$angle]),4);
		$trigTab[5][$angle]=number_format(tan($trigTab[2][$angle]),4);
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
		for($cols=1;$cols<=5;$cols++){
			echo "<td>".$trigTab[$cols][$angle]."</td>";		
		}
		echo "</tr>";
	};
?>
</table>
<?php
	echo "<p>The number of elements in the columns are ".count($degree)."</p>";
?>
</body>
</html>