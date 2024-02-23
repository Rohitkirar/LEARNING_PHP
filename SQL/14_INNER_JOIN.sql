USE classicmodels;

-- Note: The INNER JOIN keyword returns only rows with a match in both tables. 
-- Which means that if you have a product with no CategoryID, 
-- or with a CategoryID that is not present in the Categories table, 
-- that record would not be returned in the result.

-- JOIN or INNER JOIN 
-- ->JOIN and INNER JOIN will return the same result.
-- -> INNER is the default join type for JOIN, so when you write JOIN the parser actually writes INNER JOIN.



SELECT * FROM EMPLOYEES;
SELECT * FROM offices;

-- INNER JOIN using USING() function to join table

SELECT employeeNumber , CONCAT(firstName , ' ' , lastName) as fullName , city , state , country
FROM employees
INNER JOIN offices USING(officeCode)
WHERE state IS NOT NULL;

-- INNER JOIN  using ON to specify condition to join table

SELECT employeeNumber , CONCAT(firstName , ' ' , lastName) as FullName , city  , state , country 
FROM employees as e 
INNER JOIN offices as o ON e.officeCode = o.officeCode;

-- It is a good practice to include the table name when specifying columns in the SQL statement.

SELECT employees.employeeNumber , employees.firstName , employees.lastName , offices.city , offices.state , offices.country
FROM employees 
INNER JOIN offices
ON employees.officeCode = offices.officeCode
WHERE state IS NOT NULL ;

-- JOIN default refer to INNER JOIN so instead of INNER JOIN WE CAN USE JOIN ALSO

SELECT e.employeeNumber , e.firstName , e.lastName , o.city , o.state , o.country
FROM employees as e 
JOIN offices as o 
ON e.officeCode = o.officeCode
WHERE state IS NOT NULL
AND country <> 'USA';

-- Join THREE tables with the help of join and common column value

SELECT customerNumber , customerName , count(ordernumber) as totalOrder , sum(amount) as totalAmount
FROM customers 
JOIN
orders USING(customerNumber)
JOIN
payments 
USING(customerNumber)
GROUP BY customerNumber
ORDER BY totalOrder DESC;

-- Join 3 three table customers, orders, payments to find customer customernumber , customerName phone , fulladdress ,  
-- salesRep , creditlimit , totalorder , totalamount

SELECT customerNumber , customerName , phone , CONCAT(addressLine1, ', ' , city, ', ' , state, ', ' , postalCode, ', ' , country) as Address , salesRepEmployeeNumber , creditLimit , count(orderNumber) as totalOrder , sum(amount) as totalAmount FROM customers 
JOIN
orders USING(customerNumber)
JOIN
payments
USING(customerNumber)
WHERE state IS NOT NULL 
AND city IS NOT NULL
AND postalCode IS NOT NULL
AND country IS NOT NULL 
AND addressLine1 IS NOT NULL
GROUP BY customerNumber;

-- get productCode , productname from product table and textDescription from productlines

SELECT p.productCode , p.productname , pl.textDescription 
FROM products AS p 
JOIN 
productlines AS pl
USING(productline);

-- get orderNumber , orderstatus and total sales from orders and orderdetails table using group by clause

SELECT o.orderNumber , o.status , sum(od.quantityOrdered * od.priceEach) as total
FROM orders as o 
JOIN 
orderdetails as od
ON o.orderNumber = od.orderNumber
GROUP BY orderNumber;

-- JOIN 3 tables orders , orderdetails and products and get orderNumber, orderdate , orderLineNumber , productName , quantityOrdered , priceEach

SELECT  o.orderNumber , o.orderdate , od.orderLineNumber , p.productName , od.quantityOrdered , od.priceEach
FROM orders AS o 
JOIN orderdetails AS od USING(orderNumber)
JOIN products AS  p USING(productCode)
ORDER BY o.orderNUMBER, 
orderLineNumber;

-- joining 4 tables customers, orders, orderdetails and products

SELECT orderNumber, orderDate , customerName , orderLineNumber , productName , quantityOrdered , priceEach
FROM orders
JOIN orderdetails USING (orderNumber)
JOIN products USING(productCode)
JOIN customers USING(customerNumber)
ORDER BY orderNumber,
orderLineNumber;

-- In addition to the equal operator (=), you can use other operators such as greater than ( >), 
-- less than ( <), and not-equal ( <>) operator to form the join condition.

SELECT c.customerNumber , c.customerName , count(o.orderNumber) as totalOrder , sum(od.quantityOrdered*od.priceEach) as totalAmount
FROM orders as o 
JOIN orderdetails as od USING(orderNumber)
JOIN customers as c ON o.customerNumber = c.customerNumber
AND c.customerNumber BETWEEN 100 AND 200 
GROUP BY customerNumber;


