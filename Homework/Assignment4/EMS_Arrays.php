<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php
			// Jaime Montes de Oca
			// Sept 27, 2014
			// Purpose: Output the Electromagnetic Spectrum Band in a table using arrays and the displaying the results.
		?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Electromagnetic Spectrum (Arrays)</title>
    </head>
        
    <body>
    	<h1>ElectroMagnetic Spectrum</h1>

		<!-- Displays the Electromagnetic Spectrum image -->
		<img src='ElectroMagneticSpectrum.PNG' alt='ElectroMagnecticSpectrum'>
		
		<!-- Start with the table and output the headers -->
		<table width='auto' border='2'>
		<tr><th>Row</th>
		<th>Wavelength (in meters)</th>
		<th>Band</th></tr>
			
        <?php
			// Set the values for each range
			$Radio = 3;
			$Microwave = -2;
			$Infrared = -5;
			$Visible = -6;
			$Ultraviolet = -8;
			$XRay = -10;
			
			// String for output the Band
			$strOutput = "";
			$strLast = "";
			
			// Initialize arrays
			$Rows = Array();
			$Waves = Array();
			$Bands = Array();
			
			// Row counter
			$Row = 1;
			
			// Fill the table with all the values for the electromagnetic spectrum
			for ($i=3; $i>=-12; $i--):
				if($i >= $Radio){
					// Radio
					$strOutput =  "Radio";
				}
				elseif($i < $Radio && $i >= $Microwave){
					// Microwave
					$strOutput = "Microwave";
				}
				elseif($i < $Microwave && $i >= $Infrared){
					// Infrared
					$strOutput = "Infrared";
				}
				elseif($i < $Infrared && $i >= $Visible){
					// Visible
					$strOutput = "Visible";
				}
				elseif($i < $Visible && $i >= $Ultraviolet){
					// Ultraviolet
					$strOutput = "Ultraviolet";
				}
				elseif($i < $Ultraviolet && $i >= $XRay){
					// X-Ray
					$strOutput = "X-Ray";
				}
				elseif($i < $XRay){
					// Gamma Ray
					$strOutput = "Gamma Ray";
				}

				// Assign values to arrays
				$Rows[$Row] = $Row;
				$Waves[$Row] = $i;
				if ($strLast <> $strOutput) {
					$Bands[$Row] = $strOutput;
					$strLast = $strOutput;
				}
				else {
					// If it is the same Band that last row, do not output it
					$Bands[$Row] = " ";
				}
				
				$Row++;
			endfor;
			
			for ($i=1; $i<=Count($Rows); $i++):
				echo "<tr><td>$Rows[$i]</td><td><center>10<sup>$Waves[$i]</sup></center></td><th><center>$Bands[$i]</center></th></tr>";
			endfor;
			
		?>
		
		</table>
    </body>
</html>
