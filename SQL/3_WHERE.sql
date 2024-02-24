use classicmodels;

SELECT first_name FROM customers_100 
WHERE country = 'bharat' ;

SELECT S_NO , first_name , last_name , city ,  country FROM customers_100
WHERE S_NO > 90  AND country = 'bharat'
ORDER BY S_NO;

SELECT DISTINCT first_name FROM customers_100
WHERE  city = 'bhopal';

SELECT DISTINCT FIRST_name FROM customers_100 
WHERE city != 'bhopal';

SELECT DISTINCT FIRST_name FROM customers_100 
WHERE city <> 'bhopal';

SELECT DISTINCT * FROM customers_100
WHERE First_name LIKE 'R%' AND city = 'bhopal' ;



-- The WHERE clause is used to filter records.
-- It is used to extract only those records that fulfill a specified condition.
-- Note: The WHERE clause is not only used in SELECT statements, it is also used in UPDATE, DELETE, etc.!