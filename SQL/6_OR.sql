USE classicmodels;

-- If both A and B are not NULL, the OR operator returns 1 (true) if either A or B is non-zero
SELECT 1 OR 1, 1 OR 0, 0 OR 1;

-- When A and / or B is NULL, the OR operator returns 1 (true) if either A or B is non-zero. Otherwise, it returns NULL. 

SELECT 1 OR NULL, 0 OR NULL, NULL or NULL;

SELECT * FROM customers;

SELECT customerName , country , creditLimit 
FROM customers
WHERE (country = 'FRANCE' OR country = 'USA') AND creditLIMit>= 50000;

SELECT customerName , country FROM customers 
WHERE country = 'france' OR country = 'USA'
ORDER BY customerName;

SELECT customerName , country FROM customers
WHERE (country = 'france' OR country = 'usa')
AND customerName LIKE 'M%';

SELECT customerName , country FROM customers
WHERE (country = 'france' OR country = 'usa')
AND (customerName LIKE 'M%' OR customerName LIKE 'A%')
ORDER BY customerName;


