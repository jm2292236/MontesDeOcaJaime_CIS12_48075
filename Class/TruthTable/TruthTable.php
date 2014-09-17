<?php
/*
	Dr. Mark E. Lehr
    Sept 3rd, 2014
    Purpose:  Duplicate Truth Table
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Truth Table</title>
</head>

<body>
	<?php
		//Echo out a heading
		echo "<h1>Truth Table</h1>";
	?>
	<table width="200" border="1">
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
  		</tr><tr>
        <?php
			$x=true;
			$y=true;
			echo "<td>".($x?"T":"F")."</td>";
			echo "<td>".($y?"T":"F")."</td>";
			echo "<td>".(!$x?"T":"F")."</td>";
			echo "<td>".(!$y?"T":"F")."</td>";
			echo "<td>".($x&&$y?"T":"F")."</td>";
		?>
        </tr><tr>
        <?php
			$y=false;
			echo "<td>".($x?"T":"F")."</td>";
			echo "<td>".($y?"T":"F")."</td>";
			echo "<td>".(!$x?"T":"F")."</td>";
			echo "<td>".(!$y?"T":"F")."</td>";
			echo "<td>".($x&&$y?"T":"F")."</td>";
		?>
        </tr><tr>
        </tr><tr>
        </tr>
	</table>
</body>
</html>