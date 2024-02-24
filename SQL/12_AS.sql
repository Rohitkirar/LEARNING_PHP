USE classicmodels;

-- Use MySQL aliases to assign a column or a table a temporary name.
-- Use a column alias to assign a temporary name to a column in a query.
-- Use a table alias to assign a temporary name to a table in a query.

SELECT orderNumber as 'Order no.',
    SUM(priceEach * quantityOrdered) Total
FROM orderdetails
GROUP BY orderNumber
Having Total > 60000;


SELECT  CONCAT(e.firstname, ' ' , e.lastname) as fullName
FROM employees as e 
WHERE firstname LIKE 'G%' 
OR firstName LIKE 'B%'
ORDER BY fullName DESC ;

SELECT customerName , 
COUNT(o.orderNumber) as totalOrders
FROM customers as c
INNER JOIN orders as o 
ON c.customerNumber = o.customerNumber
GROUP BY customerName
HAVING totalOrders > 10 
ORDER BY totalOrders DESC