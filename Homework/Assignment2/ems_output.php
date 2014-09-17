<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php
			// Jaime Montes de Oca
			// Sept 15, 2014
			// Purpose: Output the Electromagnetic Spectrum Band from the input entered by the user.
			//			It uses ems_input.html to get the value.
		?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Electromagnetic Spectrum</title>
    </head>
        
    <body>
    	<h1>ElectroMagnetic Spectrum</h1>
        <?php
			$meters = $_GET['meters'];
			$Calculated = pow(10, $meters);

			// Set the values for each range
			$Radio = pow(10,3);
			$Microwave = pow(10,-2);
			$Infrared = pow(10,-5);
			$Visible = pow(10,-6);
			$Ultraviolet = pow(10,-8);
			$XRay = pow(10,-10);
			
			$strOutput = "";
			
			// Output which spectrum the user's input places them
			if($Calculated >= pow(10,3)){
				// Radio
				$strOutput =  "Radio";
			}
			elseif($Calculated < $Radio && $Calculated >= $Microwave){
				// Microwave
				$strOutput = "Microwave";
			}
			elseif($Calculated < $Microwave && $Calculated >= $Infrared){
				// Infrared
				$strOutput = "Infrared";
			}
			elseif($Calculated < $Infrared && $Calculated >= $Visible){
				// Visible
				$strOutput = "Visible";
			}
			elseif($Calculated < $Visible && $Calculated >= $Ultraviolet){
				// Ultraviolet
				$strOutput = "Ultraviolet";
			}
			elseif($Calculated < $Ultraviolet && $Calculated >= $XRay){
				// X-Ray
				$strOutput = "X-Ray";
			}
			elseif($Calculated < $XRay){
				// Gamma Ray
				$strOutput = "Gamma Ray";
			}
			
			// Display the result message
			echo "<p>The value you entered <b>(" . $meters . ")</b> corresponds to the <b>" . $strOutput . "</b> spectrum (see image below)</p>";
		?>
		
		<!-- Displays the Electromagnetic Spectrum -->
		<img src='ElectroMagneticSpectrum.PNG' alt='ElectroMagnecticSpectrum'>";
		
    </body>
</html>
