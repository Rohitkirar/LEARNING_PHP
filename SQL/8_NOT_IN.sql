
USE classicmodels;

-- By using the NOT keyword in front of the IN operator, you return all records that are NOT any of the values in the list.
-- The NOT IN operator returns one if the value doesn’t equal any value in the list

SELECT * FROM customers;

SELECT customerName, country , creditLIMIT 
FROM customers
WHERE country NOT IN ('USA' , 'france' , 'sweden' , 'AUSTRALIA');


SELECT customerName, country , creditLIMIT 
FROM customers
WHERE customerNumber  NOT IN ( SELECT customerNumber FROM orders );


SELECT customerName, country , creditLIMIT 
FROM customers
WHERE customerNumber IN ( SELECT customerNumber FROM orders );


SELECT customerName, country , creditLIMIT 
FROM customers 
WHERE creditLIMIT NOT IN (0 )
ORDER BY country;
