<?php # Script 9.6 - view_products.php #2
	// This script retrieves all the records from the products table.

	$page_title = 'View the Product Catalog';
	include ('includes/header.html');

	// Page header:
	echo '<h1>Products</h1>';

	require ('../mysqli_connect.php'); // Connect to the db.
			
	// Make the query:
	$q = "SELECT code, description, price FROM jm2292236_e_product ORDER BY code ASC";		
	$r = @mysqli_query ($dbc, $q); // Run the query.

	// Count the number of returned rows:
	$num = mysqli_num_rows($r);

	if ($num > 0) { // If it ran OK, display the records.

		// Print how many products there are:
		echo "<p>There are currently $num products.</p>\n";

		// Table header.
		echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
			<tr>
				<td align="left"><b>Code</b></td>
				<td align="left"><b>Description</b></td>
				<td align="left"><b>Price</b></td>
			</tr>
		';
		
		// Fetch and print all the records:
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			echo 
				'<tr>
					<td align="left">' . $row['code'] . '</td>
					<td align="left">' . $row['description'] . '</td>
					<td align="left">' . $row['price'] . '</td>
				</tr>
			';
		}

		echo '</table>'; // Close the table.
		
		mysqli_free_result ($r); // Free up the resources.	

	} else { // If no records were returned.
		echo '<p class="error">There are currently no registered users.</p>';
	}

	mysqli_close($dbc); // Close the database connection.

	include ('includes/footer.html');
?>