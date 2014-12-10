<?php
	// Connect to the db.
	require ('mysqli_connect.php');
	    
	// Get the maker_ids
	$q = "SELECT MIN(maker_id) min, MAX(maker_id) max FROM jm2292236_enum_maker";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	if ($r) { // If it ran OK,
		// Fetch all the records
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$min_maker_id = $row['min'];
			$max_maker_id = $row['max'];
		}
		
	} else {
		$min_maker_id = 1;
		$max_maker_id = 100;
	}
	
	//Query the database
    $query = "INSERT INTO `jm2292236_enum_maker_model`
							(`maker_id`,`model_name`) VALUES ";
						
	$records = 1000;
    for($i = 1; $i<=$records; $i++){
		// order_id
        $query .= "(" .rand($min_maker_id, $max_maker_id) .",";
		
		// price
		$query .= "'Model" .rand(1,9999) ."')";
		
		if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
