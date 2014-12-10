<?php
	// Connect to the db.
	require ('mysqli_connect.php');
	    
	// Get the order_ids
	$q = "SELECT MIN(order_id) min, MAX(order_id) max FROM jm2292236_e_order";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	if ($r) { // If it ran OK,
		// Fetch all the records
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$min_order_id = $row['min'];
			$max_order_id = $row['max'];
		}
		
	} else {
		$min_order_id = 1;
		$max_order_id = 1000;
	}
	
	// Get the product_ids
	$q = "SELECT MIN(product_id) min, MAX(product_id) max FROM jm2292236_e_product";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	if ($r) { // If it ran OK,
		// Fetch all the records
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$min_product_id = $row['min'];
			$max_product_id = $row['max'];
		}
		
	} else {
		$min_product_id = 1;
		$max_product_id = 100;
	}
	
	//Query the database
    $query = "INSERT INTO `jm2292236_xr_product_order`
							(`order_id`,`product_id`, `quantity`, `price`) VALUES ";
						
	$records = 1000;
    for($i = 1; $i<=$records; $i++){
		// order_id
        $query .= "(" .rand($min_order_id, $max_order_id) .",";
		
		// product_id
        $query .= rand($min_product_id, $max_product_id) .",";

		// quantity
		$query .= rand(1,99) .",";
		
		// price
		$query .= rand(1,99999) .")";
		
		if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
