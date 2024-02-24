USE classicmodels;

/*
-> the LEFT JOIN returns all rows from the left table, 
	irrespective of whether a matching row from the right table exists or not.

-> In the absence of a match, the columns of the row from the right table will be filled with NULL values.

-> The LEFT JOIN clause is very useful when you need to identify rows in a table
 that doesn’t have a matching row from another table.
 
-> Notice that for INNER JOIN clause, the condition in the ON clause is equivalent to the condition in the WHERE clause.
*/

-- joining customers and orders table using LEFT JOIN to find customer who never order

SELECT c.customerNumber , c.customerName , o.orderNumber , o.status
FROM customers as c 
LEFT JOIN 
orders as o 
USING(customerNumber)
WHERE orderNumber IS NULL ;

-- joining employees, customers and payments table get empfullName , customerName , checkNumber, amount

SELECT * FROM employees;

SELECT CONCAT(e.firstName,' ' ,e.lastName) AS empFullName,
c.customerName , p.checkNumber , p.amount 
FROM employees AS e 
LEFT JOIN 
customers AS c 
ON e.employeeNumber = c.salesRepEmployeeNumber 
LEFT JOIN 
payments AS p 
USING(customerNumber) 
ORDER BY c.customerName,
p.amount DESC;

-- using LEFT JOIN clause to query data orders and  orderDetails tables:
-- get orderNumber, customerNumber ,  productcode
-- condition in on clause

SELECT o.orderNumber , o.customerNumber , od.productCode
FROM 
orders AS o 
LEFT JOIN 
orderdetails AS od 
ON o.orderNumber = od.orderNumber 
AND o.orderNumber = 10100
ORDER BY orderNumber;

-- condition in where clause

SELECT o.orderNumber , o.customerNumber , od.productCode
FROM 
orders AS o 
LEFT JOIN 
orderdetails AS od 
ON o.orderNumber = od.orderNumber 
WHERE o.orderNumber = 10100
ORDER BY orderNumber;







