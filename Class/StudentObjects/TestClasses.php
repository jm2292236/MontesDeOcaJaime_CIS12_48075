<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--
Dr. Mark E. Lehr
July 2nd, 2011
Test the Financial and Format classes
Example of OOP
-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Testing Classes ! :)</title>
	<?php include './Course.php';
	      include './Student.php';
	      include './Format.php';    ?>
<?php
	function dsplyStudent($x){
		$all=array();
		array_push($all,$x->getName(),
		      			$x->getAddress(),
						$x->getPhone());
		$out=new Format();
		$des=array('Student Name = ',
				   'Address = ',
				   'Phone = ');
		$out->OLD('Student Object',$des,$all);
		//Display the courses
		$xClasses=array();
		$xClasses=$x->getClass_List();
		for($class=0;$class<count($xClasses);$class++){
			dsplyCourse($xClasses[$class]);
		}
	}
	function dsplyCourse($x){
		$all=array();
		array_push($all,$x->getName(),
		      			$x->getDiscipline(),
						$x->getNumber(),
						$x->getUnits(),
						$x->getSecNumber(),
						$x->getScore(),
						$x->getGrade());
		$out=new Format();
		$des=array('Course Name = ',
				   'Discipline = ',
				   'Course Number = ',
				   'Unit Value = ',
				   'Section Number = ',
				   'Score = ',
				   'Grade = ');
		$out->OLD('Course Object',$des,$all);
	}
?>
</head>

<body>
	<?php
		//Create a student
		$mark=new Student("Mark","4800 Magnolia Ave, 92506","951.222.8260");
		//Courses taken by student
		$x=new Course('PHP','CIS',12,3,47278);
		$x->setScore(83);
		$y=new Course('Javascript','CIS','14a',3,47279);
		$y->setScore(75);
		//Add the course to his class list
		$mark->setClass_List($x);
		$mark->setClass_List($y);
		//Display the result
		dsplyStudent($mark);
	?>
</body>
</html>