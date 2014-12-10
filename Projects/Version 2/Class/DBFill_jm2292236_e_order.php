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
		$max_user_id = 1000;
	}
	
	// Get the shipping_ids
	$q = "SELECT MIN(shipping_id) min, MAX(shipping_id) max FROM jm2292236_enum_shipping";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	if ($r) { // If it ran OK,
		// Fetch all the records
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$min_shipping_id = $row['min'];
			$max_shipping_id = $row['max'];
		}
		
	} else {
		$min_shipping_id = 1;
		$max_shipping_id = 100;
	}
	
	//Query the database
    $query = "INSERT INTO `jm2292236_e_order`
							(`date`,`user_id`,`subtotal`, `tax`, `shipping_id`) VALUES ";
						
	$records = 1000;
    for($i = 1; $i<=$records; $i++){
		// date
		$query .= "('" .rand(1950, 2010) ."-" .rand(1, 12) ."-" .rand(1, 28) ."',";
		
		// user_id
        $query .= rand($min_user_id, $max_user_id) .",";
		
		// subtotal
		$subtotal = rand(1,99999);
		$query .= " $subtotal,";
		
		// tax
		$tax = $subtotal * 0.0825;
		$query .= " $tax, ";
		
		// shiping_id
        $query .= rand($min_shipping_id, $max_shipping_id) .")";
        
		if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
