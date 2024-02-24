USE classicmodels;

SELECT * FROM EMPLOYEES;
SELECT * FROM offices;

SELECT employeeNumber , CONCAT(firstName , ' ' , lastName) as fullName , city , state , country
FROM employees
INNER JOIN offices USING(officeCode)
WHERE state IS NOT NULL;

SELECT employeeNumber , CONCAT(firstName , ' ' , lastName) as FullName , city  , state , country 
FROM employees as e 
INNER JOIN offices as o ON e.officeCode = o.officeCode;

SELECT * FROM customers;
SELECT * FROM orders;
SELECT * FROM payments;

SELECT customerNumber , customerName , count(ordernumber) as totalOrder , sum(amount) as totalAmount
FROM customers 
INNER JOIN
orders USING(customerNumber)
INNER JOIN
payments 
USING(customerNumber)
GROUP BY customerNumber
ORDER BY customerNumber;

SELECT * FROM customers 
INNER JOIN
orders USING(customerNumber)
INNER JOIN
payments
USING(customerNumber);


/* 
 -> A relational database consists of multiple related tables linking together using common columns, which are known as foreign key columns.
    Because of this, the data in each table is incomplete from the business perspective.
 -> A join is a method of linking data between one (self-join) or more tables 
    based on the values of the common column between the tables.
 -> MySQL supports the following types of joins:
    
    1) Inner join
    2) Left join
    3) Right join
    4) Cross join 

 -> Note that MySQL hasn’t supported the FULL OUTER JOIN yet.
 -> If the join condition uses the equality operator (=) and 
    the column names in both tables used for matching are the same, and you can use the USING clause instead:
 
	Here are the different types of the JOINs in SQL:

	(INNER) JOIN: Returns records that have matching values in both tables
	LEFT (OUTER) JOIN: Returns all records from the left table, and the matched records from the right table
	RIGHT (OUTER) JOIN: Returns all records from the right table, and the matched records from the left table

 */
