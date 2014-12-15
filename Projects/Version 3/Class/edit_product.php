<?php # Script 10.3 - edit_user.php
	// This page is for editing a product record.
	// This page is accessed through view_products.php.

	$page_title = 'Edit a Product';
	include ('includes/header.html');
	echo '<h1>Edit a Product</h1>';

	// Check for a valid product ID, through GET or POST:
	if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
		$id = $_GET['id'];
	} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
		$id = $_POST['id'];
	} else { // No valid ID, kill the script.
		echo '<p class="error">This page has been accessed in error.</p>';
		include ('includes/footer.html'); 
		exit();
	}

	require ('../mysqli_connect.php'); 

	// Check if the form has been submitted:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$errors = array();
		
		// Check for a code:
		if (empty($_POST['code'])) {
			$errors[] = 'You forgot to enter the code.';
		} else {
			$code = mysqli_real_escape_string($dbc, trim($_POST['code']));
		}
		
		// Check for description
		if (empty($_POST['description'])) {
			$errors[] = 'You forgot to enter the description.';
		} else {
			$description = mysqli_real_escape_string($dbc, trim($_POST['description']));
		}

		// Check for price
		if (empty($_POST['price'])) {
			$errors[] = 'You forgot to enter the price.';
		} else {
			$price = mysqli_real_escape_string($dbc, trim($_POST['price']));
		}
		
		if (empty($errors)) { // If everything's OK.
		
			//  Test for unique description
			$q = "SELECT product_id FROM jm2292236_e_product WHERE description='$description' AND product_id != $id";
			$r = @mysqli_query($dbc, $q);
			if (mysqli_num_rows($r) == 0) {

				// Make the query:
				$q = "UPDATE jm2292236_e_product SET description='$description', price='$price' WHERE product_id=$id LIMIT 1";
				$r = @mysqli_query ($dbc, $q);
				if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

					// Print a message:
					echo '<p>The product has been edited.</p>';	
					
				} else { // If it did not run OK.
					echo '<p class="error">The product could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
					echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
				}
					
			} else { // Already registered.
				echo '<p class="error">The product has already been registered.</p>';
			}
			
		} else { // Report the errors.

			echo '<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
			echo '</p><p>Please try again.</p>';
		
		} // End of if (empty($errors)) IF.

	} // End of submit conditional.

	// Always show the form...

	// Retrieve the product's information:
	$q = "SELECT code, description, price FROM jm2292236_e_product WHERE product_id=$id";		
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // Valid product ID, show the form.
		// Get the product's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Create the form:
		echo '<form action="edit_product.php" method="post">
			<p>Code: <input type="text" name="code" size="15" maxlength="15" value="' . $row[0] . '" /></p>
			<p>Description: <input type="text" name="description" size="100" maxlength="30" value="' . $row[1] . '" /></p>
			<p>Price: <input type="text" name="price" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
			<p><input type="submit" name="submit" value="Submit" /></p>
			<input type="hidden" name="id" value="' . $id . '" />
			</form>';

	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
	}

	mysqli_close($dbc);
			
	include ('includes/footer.html');
?>
