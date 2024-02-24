use classicmodels;

SELECT * FROM customers_100 ;  


SELECT First_name,
		Last_Name,
        company
FROM customers_100 ;


SELECT * FROM customers_100 
WHERE country = 'Belarus';


SELECT COUNT(first_name) FROM customers_100;


SELECT * FROM customers_100
WHERE first_name LIKE 'A%';


SELECT * FROM customers_100 
WHERE first_name LIKE 'A%A' ;


SELECT * FROM customers_100
WHERE city LIKE 'east%' ;


SELECT * FROM customers_100 
WHERE phone_1 LIKE '001%' OR phone_2 LIKE '001%' ;


SELECT S_NO , First_Name 
FROM customers_100 
ORDER BY S_NO 
LIMIT 10 ;


SELECT country , COUNT(first_name) 
FROM customers_100 
GROUP BY country;

SELECT country , COUNT(customer_ID) as count 
FROM customers_100 
GROUP BY country 
HAVING count>1 ;