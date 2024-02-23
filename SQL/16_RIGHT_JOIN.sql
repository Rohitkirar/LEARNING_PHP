USE classicmodels;

/*
-> MySQL RIGHT JOIN is similar to LEFT JOIN, except that the treatment of the joined tables is reversed.
-> The RIGHT JOIN keyword returns all records from the right table (table2), and the matching records from the left table (table1). The result is 0 records from the left side, if there is no match.
-> Note: The RIGHT JOIN keyword returns all records from the right table (Employees), even if there are no matches in the left table (Orders).

*/

SELECT 
	employeeNumber,
    customerNumber
FROM
	customers
RIGHT JOIN employees
	ON salesRepEmployeeNumber = employeeNumber
ORDER BY employeeNumber;

-- find employees who are not incharge of any customer

SELECT employeeNumber, CONCAT(firstName , ' ' ,lastName) as fullName,
customerNumber
FROM customers 
RIGHT JOIN employees
on customers.SalesRepEMployeeNumber = employeeNumber
AND customerNumber IS NULL
ORDER BY fullName;

-- to get customerName ,  customerid , 

SELECT * FROM orders;
SELECT * FROM customers;
SELECT * FROM orderdetails;

SELECT customerNumber , customerName , orderNumber , quantityOrdered , priceEach
FROM orderdetails
RIGHT JOIN 
orders USING(orderNumber)
RIGHT JOIN
customers USING(customerNumber)
WHERE orderNumber IS NULL;


-- The RIGHT JOIN starts selecting rows from the right table. It always returns rows from the right table whether or not there are matching rows in the left table.
