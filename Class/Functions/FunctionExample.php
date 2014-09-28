<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All About Functions</title>
<?php
	//Functions calling other functions
	function fValue1($p,$i,$n){
		return $p*pow((1+$i/100),$n);
	}
	//Functions utilizing control constructs
	function fValue2($p,$i,$n){
		$fValue=$p;
		for($year=1;$year<=$n;$year++){
			$fValue*=(1+$i/100);
		}
		return $fValue;
	}
	//Functions calling functions calling functions
	function fValue3($p,$i,$n){
		return $p*exp($n*log(1+$i/100));
	}
	//Functions calling themselves
	function fValue4($p,$i,$n){
		if($n==0)return $p;
		else return fValue4($p,$i,$n-1)*(1+$i/100);
	}
	//Difference between pass by value and pass by reference
	//& represents pass by reference
	//Allows the variable to be utilized as an input
	//as well as an output that is returned
	function fValue5($p,$i,$n,&$fValue){
		$fValue=$p;
		for($year=1;$year<=$n;$year++){
			$fValue*=(1+$i/100);
		}
	}
	//Defaulted parameters
	//To prevent ambiguity these parameters
	//must be to the far right of the argument list
	function fValue6($p,$i,$n=9){
		return $p*pow((1+$i/100),$n);
	}
?>
</head>

<body>
<?php
	//Declare and initialize variables
	$pValue=100;//Present Value in $'s
	$iRate=9;//Interest/Investment rate % per year
	$cPeriods=8;//Number of compounding periods (years)
	//Utilize the function
	$fValue1=number_format(fValue1($pValue,$iRate,$cPeriods),2);
	$fValue2=number_format(fValue2($pValue,$iRate,$cPeriods),2);
	$fValue3=number_format(fValue3($pValue,$iRate,$cPeriods),2);
	$fValue4=number_format(fValue4($pValue,$iRate,$cPeriods),2);
	fValue5($pValue,$iRate,$cPeriods,$fValue5);
	$fValue5=number_format($fValue5,2);
	$fValue6=number_format(fValue6($pValue,$iRate),2);//Defaulted Value of 9
	$fValue6a=number_format(fValue6($pValue,$iRate,$cPeriods),2);
	//Display the results
	echo "<p>Present Value = $$pValue</p>";
	echo "<p>Investment Rate = $iRate %</p>";
	echo "<p>Compounding Periods = $cPeriods (years)</p>";
	echo "<p>Future Value1 = $$fValue1</p>";
	echo "<p>Future Value2 = $$fValue2</p>";
	echo "<p>Future Value3 = $$fValue3</p>";
	echo "<p>Future Value4 = $$fValue4</p>";
	echo "<p>Future Value5 = $$fValue5</p>";
	echo "<p>Future Value6 = $$fValue6 Periods defaulted to 9 years</p>";
	echo "<p>Future Value6a = $$fValue6a</p>";
?>
</body>
</html>