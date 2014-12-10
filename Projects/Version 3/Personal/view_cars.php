<?php # Script 10.5 - #5
	// This script retrieves all the records from the cars table.
	// This is an exclusive feature for the Administrator, not available for normal users.
	// This new version allows the results to be sorted in different ways.

	$page_title = 'View Cars';
	include ('includes/header.html');
	echo '<h1>Cars</h1>';

	require ('../mysqli_connect.php');

	// Number of records to show per page:
	$display = 10;

	// Determine how many pages there are...
	if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
		$pages = $_GET['p'];
	} else { // Need to determine.
		// Count the number of records:
		$q = "SELECT COUNT(car_id) FROM jm2292236_e_car";
		$r = @mysqli_query ($dbc, $q);
		$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
		$records = $row[0];
		
		// Calculate the number of pages...
		if ($records > $display) { // More than 1 page.
			$pages = ceil ($records/$display);
		} else {
			$pages = 1;
		}
	} // End of p IF.

	// Determine where in the database to start returning results...
	if (isset($_GET['s']) && is_numeric($_GET['s'])) {
		$start = $_GET['s'];
	} else {
		$start = 0;
	}

	// Determine the sort...
	// Default is by code
	$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'cd';

	// Determine the sorting order:
	switch ($sort) {
		case 'maker':
			$order_by = 'maker_model_id ASC';
			break;
		default:
			$order_by = 'user_id ASC';
			$sort = 'user';
			break;
	}
		
	// Define the query:
	$q = "SELECT car_id, user_id, maker_model_id, year, description, plate FROM jm2292236_e_car ORDER BY $order_by LIMIT $start, $display";
	$r = @mysqli_query ($dbc, $q); // Run the query.

	// Table header:
	echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
		<tr>
			<td align="left"><b>Edit</b></td>
			<td align="left"><b>Delete</b></td>
			<td align="left"><b><a href="view_cars.php?sort=ln">Year</a></b></td>
			<td align="left"><b><a href="view_cars.php?sort=fn">Description</a></b></td>
			<td align="right"><b><a href="view_cars.php?sort=rd">Plate</a></b></td>
		</tr>
	';

	// Fetch and print all the records....
	$bg = '#eeeeee'; 
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
			echo '<tr bgcolor="' . $bg . '">
			<td align="left"><a href="edit_car.php?id=' . $row['car_id'] . '">Edit</a></td>
			<td align="left"><a href="delete_car.php?id=' . $row['car_id'] . '">Delete</a></td>
			<td align="left">' . $row['year'] . '</td>
			<td align="left">' . $row['description'] . '</td>
			<td align="right">' . $row['plate'] . '</td>
		</tr>
		';
	} // End of WHILE loop.

	echo '</table>';
	mysqli_free_result ($r);
	mysqli_close($dbc);

	// Make the links to other pages, if necessary.
	if ($pages > 1) {
		echo '<br /><p>';
		$current_page = ($start/$display) + 1;
		
		// If it's not the first page, make a Previous button:
		if ($current_page != 1) {
			echo '<a href="view_cars.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
		}
		
		// Make all the numbered pages:
		for ($i = 1; $i <= $pages; $i++) {
			if ($i != $current_page) {
				echo '<a href="view_cars.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
			} else {
				echo $i . ' ';
			}
		} // End of FOR loop.
		
		// If it's not the last page, make a Next button:
		if ($current_page != $pages) {
			echo '<a href="view_cars.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
		}
		
		echo '</p>'; // Close the paragraph.
		
	} // End of links section.
		
	include ('includes/footer.html');
?>