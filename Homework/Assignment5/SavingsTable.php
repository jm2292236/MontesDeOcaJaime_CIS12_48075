<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php
			// Jaime Montes de Oca
			// Oct 03, 2014
			// Purpose: Create a savings table with $100 of initial deposit.
			// 			Use a two dimensional array.
			// 			Create a function to fill the array and another to display the array.
			//			Seven columns: the first one for the year, from column 2 to 7 the savings rate from 5% to 10%
		?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Savings Table</title>
    </head>
        
    <body>
    	<h1>Savings Table</h1>
		<h2>Initial Deposit: $100</h2>		

		<!-- Start with the table and output the headers -->
		<table width='auto' border='1'>
		<tr>
			<th>Year</th>
			<th colspan="6"> Interest Rate</th>
		</tr>
		<tr>
			<th>   </th>
			<th>5%</th>
			<th>6%</th>
			<th>7%</th>
			<th>8%</th>
			<th>9%</th>
			<th>10%</th>
		</tr>
			
        <?php
			// Functions
			function FillArray($InitialDeposit, $Years, $StartRate, $EndRate) {
				// Initialize the array
				$arrSavings = [];
				$Row = 0;
				
				for($r = 0; $r < $Years; $r++){
//					$arrSavings[$Row] = [];
					$Column = 0;

					for($c = $StartRate; $c <= $EndRate + 1; $c++){
						if($Column == 0){
							// First column: Years
							$arrSavings[$Row][$Column] = $Row + 1;
						}
						else {
							$Rate = $c - 1;	// Only to make it descriptive

							if ($Row == 0) {
								$Amount = $InitialDeposit;
							}
							else {
								$Amount = $arrSavings[$Row - 1] [$Column];
							}

							$Amount += $Amount * ($Rate / 100);
							$arrSavings[$Row][$Column] = $Amount;
						}
						$Column += 1;
					}
					$Row += 1;
				}
				return $arrSavings;
			}
			
			function DisplayArray($Savings, $Years, $Rates) {
				for($Row = 0; $Row < $Years; $Row++){
					echo("<tr>");
					for($Col = 0; $Col <= $Rates + 1; $Col++){
						if($Col == 0){
							echo("<td align='right'>".$Savings[$Row][$Col]."</td>");
						}
						else {
							echo("<td align='right'>$".(number_format($Savings[$Row][$Col],2))."</td>");
						}
					}
					echo("</tr>");
				}
			}
			
			// ************   ************   ************   ************   ************

			$InitialDeposit = 100;
			$Years = 10;
			$StartRate = 5;
			$EndRate = 10;
			
			$arrSavings = FillArray($InitialDeposit, $Years, $StartRate, $EndRate);
			DisplayArray($arrSavings, $Years, $EndRate - $StartRate);
			
		?>
		
		</table>
    </body>
</html>
