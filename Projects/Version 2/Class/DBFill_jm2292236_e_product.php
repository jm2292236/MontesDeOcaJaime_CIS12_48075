<?php
	// Connect to the db.
	require ('mysqli_connect.php');
    
	//Query the database
    $query = "INSERT INTO `jm2292236_e_product`
							(`code`,`description`,`price`) VALUES ";
						
	$records = 1000;
    for($i = 1; $i<=$records; $i++){
		$query .= "('Code" .$i ."',";
        $query .= " 'Description" .rand(1,1000) ."',";
		$query .= rand(1,99999) .")";
        if ($i != $records) $query .= ",";
    }
    echo $query."<br/>";
    $rs = mysqli_query($dbc, $query);
	
	mysqli_close($dbc); // Close the database connection.
?>
