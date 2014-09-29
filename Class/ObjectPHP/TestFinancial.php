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
	<title>Retirement Calculations ! :)</title>
	<?php include './Financial.php';
	      include './Format.php';    ?>
</head>

<body>
	<?php
	    //Test of the Financial Calculator and the
	    //Ordered List functions in the Format Class
	    //                 PV   mDep i  f y
		$x=new Financial(110000,2600,10,3,22);
		$all=$x->getAll();
		array_push($all,$x->FV(),$x->PV($x->FV()));
		$out=new Format();
		$des=array('Present Value = $',
					'Monthly Deposit = $',
					'Investment Rate % =',
					'Inflation Rate % =',
					'Investment Period (yrs) =',
					'**Future Value** = $',
					'**Present Worth**= $');
		$out->OLD('Financial Data and Results',$des,$all);
		
		//Additional comparison using the Financial Class
		//and the table functions of the Format Class
		$out->TName('Financial Table Assumes PV=$13000, MDep=$1667,
		    and InfRate=3% showing Present Worth Calculations');
		$p=13000;$m=1667;$inf=3;
		$head=array('Year','6%','8%','10%','12%','14%','16%','18%');
		$out->THead(1,300,$head);
		for($years=1;$years<=28;$years++)
		{
			$out->TColumn('center',true,$years,false,false);
			for($int=6;$int<=18;$int+=2)
			{
				$tab=new Financial($p,$m,$int,$inf,$years);
				$out->TColumn('right',false,
				      $tab->PV($tab->FV()),$int==18,$years==28);
			}
		}
		
		//Another comparison using the Financial Class
		//and the table functions of the Format Class
		$out->TName('Financial Table Assumes PV=$5200, MDep=$400,
		    and InfRate=3% showing Present Worth Calculations');
		$p=5200;$m=400;$inf=3;
		$head=array('Year','6%','8%','10%','12%','14%','16%','18%');
		$out->THead(1,300,$head);
		for($years=1;$years<=28;$years++)
		{
			$out->TColumn('center',true,$years,false,false);
			for($int=6;$int<=18;$int+=2)
			{
				$tab=new Financial($p,$m,$int,$inf,$years);
				$out->TColumn('right',false,
				      $tab->PV($tab->FV()),$int==18,$years==28);
			}
		}
	?>
</body>
</html>