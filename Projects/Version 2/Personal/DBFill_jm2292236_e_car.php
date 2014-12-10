<?php
	// Connect to the db.
	require ('mysqli_connect.php');
	    
	// Get the user_ids
	$q = "SELECT MIN(user_id) min, MAX(user_id) max FROM jm2292236_e_user";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	if ($r) { // If it ran OK,
		// Fetch all the records
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$min_user_id = $row['min'];
			$max_user_id = $row['max'];
		}
		
	} else {
		$min_user_id = 1;
		$max_user_id = 100;
	}
	
	// Get the maker_model_ids
	$q = "SELECT MIN(maker_model_id) min, MAX(maker_model_id) max FROM jm2292236_enum_maker_model";
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
    $query = "INSERT INTO `jm2292236_e_car`
							(`user_id`,`maker_model_id`, `year`, `description`, `plate`) VALUES ";
						
	$records = 1000;
    for($i = 1; $i<=$records; $i++){
		// user_id
        $query .= "(" .rand($min_user_id, $max_user_id) .",";
		
		// maker_model_id
        $query .= rand($min_maker_id, $max_maker_id) .",";
		
		// year
		$query .= rand(1950,2015) .",";
		
		// description
		$query .= "'Description" .rand(1,1000) ."',";
		
		// plate
		$query .= "'ABCD" .rand(1,1000) ."')";
		
		if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
