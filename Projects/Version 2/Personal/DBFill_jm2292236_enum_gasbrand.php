<?php
	// Connect to the db.
	require ('mysqli_connect.php');
	    
	//Query the database
    $query = "INSERT INTO `jm2292236_enum_gasbrand`
							(`name`) VALUES ";
						
	$records = 100;
    for($i = 1; $i<=$records; $i++){
		// Description
		$query .= "('Gas Brand" .rand(1,1000) ."')";
		
		if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
