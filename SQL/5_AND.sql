USE classicmodels;

-- The logical AND operator returns 1 if both A and B are non-zero and NOT NULL. For example:

SELECT 1 AND 0, 0 AND 1, 0 AND 0, 0 AND NULL ;

-- The logical AND operator returns NULL if either operand is non-zero or both operands are NULL.

SELECT 1 AND NULL, NULL AND NULL;

SELECT * FROM customers;

SELECT  customerNumber , customerName , country 
FROM customers
WHERE country = 'france' OR country = 'USA';

SELECT customerNumber , customerName , postalCode , country
FROM customers
WHERE country = 'France' AND postalCode = 44000; 

SELECT customerNUmber , customerName , salesRepEmployeeNumber , country 
FROM customers
WHERE country = 'France' AND salesRepEmployeeNumber = 1370;

SELECT customerNUmber , customerName , salesRepEmployeeNumber , country 
FROM customers
WHERE country = 'France' AND salesRepEmployeeNumber = 1370 AND postalCode = 44000;

SELECT customerNumber , customerName , country 
FROM customers
WHERE country = 'France' AND customerName LIKE 'a%' ;

-- The AND operator displays a record if all the conditions are TRUE.
-- The OR operator displays a record if any of the conditions are TRUE.

SELECT * FROM customers
WHERE customerName LIKE 'a%' AND postalCode > 4000;

SELECT * FROM customers 
WHERE (customerName LIKE 'R%' OR customerName LIKE 'S%') AND country = 'France';