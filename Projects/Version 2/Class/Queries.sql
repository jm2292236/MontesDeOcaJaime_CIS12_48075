Query for Order details
=======================

SELECT po.xr_prod_order_id, po.quantity, po.price,
    po.product_id, p.code, p.description
FROM .jm2292236_xr_product_order po, 
	jm2292236_e_order o,
    jm2292236_e_product p
WHERE po.order_id = o.order_id
	AND po.product_id = p.product_id
    AND o.order_id = 1964
ORDER BY po.order_id;


Query for Orders
================

SELECT o.order_id, o.user_id, o.shipping_id,
	o.date, o.subtotal, o.tax, o.subtotal + o.tax total,
    CONCAT(u.first_name, " ", u.last_name) Customer,
    s.description, s.cost
FROM jm2292236_e_order o,
	jm2292236_e_user u,
    jm2292236_enum_shipping s
WHERE o.user_id = u.user_id
	AND o.shipping_id = s.shipping_id;
	
	
Query for Users (customers)
===========================

SELECT u.user_id, u.first_name, u.last_name, 
	CONCAT(u.first_name, " ", u.last_name) Customer,
    u.email, u.pass, u.registration_date, u.phone,
    u.address, u.city, u.state_id, u.country_id
FROM jm2292236_e_user u;


Query for Products
==================

SELECT p.product_id, p.code, p.description, p.price
FROM jm2292236_e_product p;


