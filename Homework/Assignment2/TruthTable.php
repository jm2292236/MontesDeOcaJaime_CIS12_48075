<?php
/*
    Jaime Montes de Oca
    September 03, 2014
    Purpose: Duplicate Truth Table
 */
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Truth Table</title>
    </head>
	
    <body>
        <?php
            //Echo out a heading
            echo "<h1>Truth Table</h1>";
        ?>
        <Table width="200" border="1">
            <tr>
                <th>X</th>
                <th>Y</th>
                <th>!X</th>
                <th>!Y</th>
                <th>X&&Y</th>
                <th>X||Y</th>
                <th>X^Y</th>
                <th>X^Y^Y</th>
                <th>X^Y^X</th>
                <th>!(X&&Y)</th>
                <th>!X||!Y</th>
                <th>!(X||Y)</th>
                <th>!X&&!Y</th>
            </tr>
            <tr>
				<?php
					$x=true;
					$y=true;
					echo "<td>" . ($x?"T":"F")."</td>";
					echo "<td>" . ($y?"T":"F")."</td>";
					echo "<td>" . (!$x?"T":"F")."</td>";
					echo "<td>" . (!$y?"T":"F")."</td>";
					echo "<td>" . ($x&&$y?"T":"F")."</td>";
					echo "<td>" . ($x||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$x?"T":"F")."</td>";
					echo "<td>" . (!($x&&$y)?"T":"F")."</td>";
					echo "<td>" . (!$x||!$y?"T":"F")."</td>";
					echo "<td>" . (!($x||$y)?"T":"F")."</td>";
					echo "<td>" . (!$x&&!$y?"T":"F")."</td>";
				?>
            </tr>
            <tr>
				<?php
					$y=false;
					echo "<td>" . ($x?"T":"F")."</td>";
					echo "<td>" . ($y?"T":"F")."</td>";
					echo "<td>" . (!$x?"T":"F")."</td>";
					echo "<td>" . (!$y?"T":"F")."</td>";
					echo "<td>" . ($x&&$y?"T":"F")."</td>";
					echo "<td>" . ($x||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$x?"T":"F")."</td>";
					echo "<td>" . (!($x&&$y)?"T":"F")."</td>";
					echo "<td>" . (!$x||!$y?"T":"F")."</td>";
					echo "<td>" . (!($x||$y)?"T":"F")."</td>";
					echo "<td>" . (!$x&&!$y?"T":"F")."</td>";
				?>
            </tr>
            <tr>
				<?php
					$x=false;
					$y=true;
					echo "<td>" . ($x?"T":"F")."</td>";
					echo "<td>" . ($y?"T":"F")."</td>";
					echo "<td>" . (!$x?"T":"F")."</td>";
					echo "<td>" . (!$y?"T":"F")."</td>";
					echo "<td>" . ($x&&$y?"T":"F")."</td>";
					echo "<td>" . ($x||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$x?"T":"F")."</td>";
					echo "<td>" . (!($x&&$y)?"T":"F")."</td>";
					echo "<td>" . (!$x||!$y?"T":"F")."</td>";
					echo "<td>" . (!($x||$y)?"T":"F")."</td>";
					echo "<td>" . (!$x&&!$y?"T":"F")."</td>";
				?>
            </tr>
            <tr>
				<?php
					$x=false;
					$y=false;
					echo "<td>" . ($x?"T":"F")."</td>";
					echo "<td>" . ($y?"T":"F")."</td>";
					echo "<td>" . (!$x?"T":"F")."</td>";
					echo "<td>" . (!$y?"T":"F")."</td>";
					echo "<td>" . ($x&&$y?"T":"F")."</td>";
					echo "<td>" . ($x||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y||$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$y?"T":"F")."</td>";
					echo "<td>" . ($x^$y^$x?"T":"F")."</td>";
					echo "<td>" . (!($x&&$y)?"T":"F")."</td>";
					echo "<td>" . (!$x||!$y?"T":"F")."</td>";
					echo "<td>" . (!($x||$y)?"T":"F")."</td>";
					echo "<td>" . (!$x&&!$y?"T":"F")."</td>";         
				?>
            </tr>
        </Table>
    </body>
</html>
