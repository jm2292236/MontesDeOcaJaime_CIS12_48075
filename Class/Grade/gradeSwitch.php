<?php
	/*
		Dr. Mark E. Lehr
		Sept 8th, 2014
		Purpose:  Illustrate Branching Constructs
	*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Grade</title>
</head>

<body>
<?php
	//Intialize the input and declare variables
	$score=rand(50,100);
	$grade='';
	//Determine the Grade
	switch($score>=90){
		case true:$grade='A';break;
		default:
			switch($score>=80){
				case true:$grade='B';break;
				default:
	        		switch($score>=70){
						case true:$grade='C';break;
						default:
							switch($score>=60){
								case true:$grade='D';break;
								default:$grade='F';
							}
					}
			}
	}
	//Output the Results
	echo "<h1>A score of $score = $grade</h1>";
?>
</body>
</html>