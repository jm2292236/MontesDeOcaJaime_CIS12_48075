<?php
	// Connect to the db.
	require ('mysqli_connect.php');
    
	//Query the database
    $query = "INSERT INTO `jm2292236_e_user`
							(`first_name`,`last_name`,`email`, `pass`,`registration_date`) VALUES ";
						
	$records = 1000;
    for($i = 1; $i<=$records; $i++){
		$query .= "('John" .$i ."',";
        $query .= " 'Smith" .rand(1,50) ."',";
		$query .= " 'email" .rand(1,500) ."@example.com',";
		$query .= " SHA1('MyPass123!@#'),";
        $query .= "'" .rand(1950, 2010) ."-" .rand(1, 12) ."-" .rand(1, 28) ."')";
        if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
