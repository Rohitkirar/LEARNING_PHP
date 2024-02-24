USE classicmodels;

-- The BETWEEN operator is a logical operator that specifies whether a value is in a range or not. 
-- The BETWEEN operator is inclusive: begin and end values are included. 

SELECT * FROM products;


SELECT productName , quantityInStock , MSRP
FROM products
WHERE MSRP BETWEEN 95.70 AND 99.31;  -- the low and high value included


SELECT productName , quantityinStock , MSRP
FROM products
WHERE MSRP >= 95.60 AND MSRP <= 99.31;


SELECT productName , buyPrice , MSRP
FROM products
WHERE MSRP NOT BETWEEN 0 AND 100;


SELECT productName , buyPRice , MSRP
FROM products
WHERE MSRP < 0 OR MSRP > 100 ;


SELECT * FROM orders;

SELECT orderNumber , status , orderDate , requiredDate
FROM orders
WHERE requiredDate BETWEEN CAST('2003-01-01' AS DATE) AND CAST('2003-01-31' AS DATE); 


SELECT * FROM orders
WHERE orderDate BETWEEN '2005-01-01' AND '2005-01-31' ;


SELECT customerNumber , orderNumber , status , orderDate , requiredDate
FROM orders
WHERE customerNumber BETWEEN 406 AND 496 
AND status = 'shipped'
ORDER BY orderDate;

SELECT customerName  FROM customers
WHERE customerName BETWEEN 'a' AND 'b' ;  -- IT doesn't include last range charater in string NOTE IMP

SELECT customerName FROM customers
WHERE SUBSTR(customerName , 1, 1) BETWEEN 'a' AND 'b' 
ORDER BY customerName;