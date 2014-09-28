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
<?php
	function trigTable($start,$stop,$step){
		//Declares 2-D array
		$trigTab=array();
		for($col=1;$col<=5;$col++){
			$trigTab[$col]=array();
		}
		//Calculations for each parallel array
		for($angle=$start;$angle<=$stop;$angle+=$step){
			//Calculate
			$trigTab[1][$angle]=$angle;
			$trigTab[2][$angle]=number_format($angle*atan(1)/45,4);
			$trigTab[3][$angle]=number_format(sin($trigTab[2][$angle]),4);
			$trigTab[4][$angle]=number_format(cos($trigTab[2][$angle]),4);
			$trigTab[5][$angle]=number_format(tan($trigTab[2][$angle]),4);
		}
		return $trigTab;
	}
	function display($str,$start,$stop,$step,$trigTab){
		echo $str;
		for($angle=$start;$angle<=$stop;$angle+=$step){
			echo "<tr>";
			for($cols=1;$cols<=5;$cols++){
				echo "<td>".$trigTab[$cols][$angle]."</td>";		
			}
			echo "</tr>";
		};
		echo "</table";
	}
?>
</head>

<body>
<h1>Trig Table</h1>
<?php
	//Input the data from the form
	$angStrt=$_GET['angStrt'];
	$angEnd=$_GET['angEnd'];
	$angInc=$_GET['angInc'];
	//Declare and fill the array
	$trigTab=trigTable($angStrt,$angEnd,$angInc);
	//Heading for Table
	$str='<table width="200" border="1">';
  	$str.="<tr>";
  	$str.="<th>Degrees</th>";
    $str.="<th>Radians</th>";
    $str.="<th>Sine</th>";
    $str.="<th>Cosine</th>";
    $str.="<th>Tangent</th>";
    $str.="</tr>";
	//Display the trig Table
	display($str,$angStrt,$angEnd,$angInc,$trigTab);
?>
</body>
</html>