<?php
	// Connect to the db.
	require ('mysqli_connect.php');
	    
	// Get the car_ids
	$q = "SELECT MIN(car_id) min, MAX(car_id) max FROM jm2292236_e_car";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	if ($r) { // If it ran OK,
		// Fetch all the records
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$min_car_id = $row['min'];
			$max_car_id = $row['max'];
		}
		
	} else {
		$min_car_id = 1;
		$max_car_id = 100;
	}
	
	// Get the gasbrand_ids
	$q = "SELECT MIN(gas_brand_id) min, MAX(gas_brand_id) max FROM jm2292236_enum_gasbrand";
	$r = @mysqli_query ($dbc, $q); // Run the query.
	if ($r) { // If it ran OK,
		// Fetch all the records
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$min_gasbrand_id = $row['min'];
			$max_gasbrand_id = $row['max'];
		}
		
	} else {
		$min_gasbrand_id = 1;
		$max_gasbrand_id = 100;
	}
	
	//Query the database
    $query = "INSERT INTO `jm2292236_e_refuel`
							(`car_id`, `gas_brand_id`, `date`, `odometer`, `price_per_gallon`, `gallons`, `amount`, `octane`) VALUES ";
						
	$records = 1000;
    for($i = 1; $i<=$records; $i++){
		// car_id
        $query .= "(" .rand($min_car_id, $max_car_id) .",";
		
		// gasbrand_id
        $query .= rand($min_gasbrand_id, $max_gasbrand_id) .",";
		
		// date
		$query .= "'" .rand(1950, 2010) ."-" .rand(1, 12) ."-" .rand(1, 28) ."',";

		// odometer
		$query .= rand(0,150000) .",";
		
		// price per gallon
		$price_per_gallon = rand(1, 5);
		$query .= $price_per_gallon .",";
		
		// gallons
		$gallons = rand(3, 33);
		$query .= $gallons .",";
		
		// amount
		$query .= $price_per_gallon * $gallons .",";
		
		// octane
		$octane = rand(1, 4);
		switch ($octane) {
			case 1: $octane = "87"; break;
			case 2: $octane = "89"; break;
			case 3: $octane = "91"; break;
			default: $octane = "DI";  // Diesel
		}
		$query .= "'" .$octane ."')";
		
		if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
