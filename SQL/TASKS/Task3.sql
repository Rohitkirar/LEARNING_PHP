

-- use outer query table column in subquery makes example at least 2 or 3
use classicmodels;

SELECT 
    customerNumber, customerName, city
FROM
    customers
WHERE
    customerNumber IN (SELECT 
							customerNumber
						FROM
							orders
						WHERE
							customers.country = 'France'
								AND city = 'paris');


