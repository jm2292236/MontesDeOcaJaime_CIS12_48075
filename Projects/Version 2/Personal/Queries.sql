Query for Gas Brands
=======================

SELECT * FROM jm2292236_enum_gasbrand;

Query for Makers
=======================

SELECT maker_id, name FROM jm2292236_enum_maker;


Query for Maker-Model
=======================

SELECT maker_model_id, maker_id, model_name FROM jm2292236_enum_maker_model;

	
Query for Users
===========================

SELECT u.user_id, u.first_name, u.last_name, 
	CONCAT(u.first_name, " ", u.last_name) Customer,
    u.email, u.pass, u.registration_date, u.phone,
    u.address, u.city, u.state_id, u.country_id
FROM jm2292236_e_user u;


Query for Cars
(This will show only the cars for a specific user)
===========================

SELECT c.car_id, c.user_id, c.maker_model_id, 
	c.year, c.description, c.plate,
    CONCAT(u.last_name, ", ", u.first_name) user,
    CONCAT_WS(" - ", m.name, mm.model_name) car
FROM jm2292236_e_car c, 
	jm2292236_e_user u, 
    jm2292236_enum_maker_model mm,
    jm2292236_enum_maker m
WHERE c.user_id = u.user_id 
	AND c.maker_model_id = mm.maker_model_id
    AND mm.maker_id = m.maker_id
	AND c.user_id = ?
ORDER BY c.user_id, mm.maker_model_id;


Query for Refueling
(This will show only the records for a specific car)
===========================

SELECT r.refuel_id, r.car_id, r.gas_brand_id,
	r.date, r.odometer, r.price_per_gallon, r.gallons, r.amount, r.octane,
    c.user_id, g.name
FROM jm2292236_e_refuel r, 
	jm2292236_e_car c,
	jm2292236_enum_gasbrand g
WHERE c.car_id = r.car_id
	AND g.gas_brand_id = r.gas_brand_id
	AND c.car_id = ?
ORDER BY r.date;


