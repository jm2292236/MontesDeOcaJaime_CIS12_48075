<?php # Script 19.6 - browse_products.php
	// This page displays the available products.

	// Set the page title and include the HTML header:
	$page_title = 'Products';
	include ('includes/header.html');

	require ('../mysqli_connect.php');
	echo '<h1>Buy Products</h1>';
	 
	// Number of records to show per page:
	$display = 10;

	// Determine how many pages there are...
	if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
		$pages = $_GET['p'];
	} else { // Need to determine.
		// Count the number of records:
		$q = "SELECT COUNT(product_id) FROM jm2292236_e_product";
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
		case 'desc':
			$order_by = 'description ASC';
			break;
		default:
			$order_by = 'code ASC';
			$sort = 'cd';
			break;
	}

	// Default query for this page:
	$q = "SELECT product_id, code, description, price FROM jm2292236_e_product ORDER BY $order_by LIMIT $start, $display";

	// Are we looking at a particular artist?
//	if (isset($_GET['aid']) && filter_var($_GET['aid'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) {
//		// Overwrite the query:
//		$q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) AS artist, print_name, price, description, print_id FROM artists, prints WHERE artists.artist_id=prints.artist_id AND prints.artist_id={$_GET['aid']} ORDER BY prints.print_name";
//	}

	// Create the table head:
	echo '<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
		<tr>
			<td align="left" width="20%"><b>Code</b></td>
			<td align="left" width="20%"><b>Description</b></td>
			<td align="right" width="20%"><b>Price</b></td>
		</tr>';

	// Display all the prints, linked to URLs:
	$r = mysqli_query ($dbc, $q);
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

		// Display each record:
		echo "\t<tr>
			<td align=\"left\"><a href=\"view_product.php?pid={$row['product_id']}\">{$row['code']}</a></td>
			<td align=\"left\">{$row['description']}</td>
			<td align=\"right\">\${$row['price']}</td>
		</tr>\n";

	} // End of while loop.

	echo '</table>';
	mysqli_free_result ($r);
	mysqli_close($dbc);
	
	// Make the links to other pages, if necessary.
	if ($pages > 1) {
		echo '<br /><p>';
		$current_page = ($start/$display) + 1;
		
		// If it's not the first page, make a Previous button:
		if ($current_page != 1) {
			echo '<a href="browse_products.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
		}
		
		// Make all the numbered pages:
		for ($i = 1; $i <= $pages; $i++) {
			if ($i != $current_page) {
				echo '<a href="browse_products.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
			} else {
				echo $i . ' ';
			}
		} // End of FOR loop.
		
		// If it's not the last page, make a Next button:
		if ($current_page != $pages) {
			echo '<a href="browse_products.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
		}
		
		echo '</p>'; // Close the paragraph.
		
	} // End of links section.

	include ('includes/footer.html');
?>
