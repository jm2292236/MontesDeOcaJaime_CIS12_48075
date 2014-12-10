<?php
	// Inserts users
	include ('DBFill_jm2292236_e_user.php');
    
	// Inserts products
	include ('DBFill_jm2292236_e_product.php');
	
	// Inserts shippings
	include ('DBFill_jm2292236_enum_shipping.php');
	
	// Inserts orders
	include ('DBFill_jm2292236_e_order.php');

	// Inserts order details
	include ('DBFill_jm2292236_xr_product_order.php');	
?>
