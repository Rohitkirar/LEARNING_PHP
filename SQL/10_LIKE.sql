USE classicmodels;

-- The LIKE operator is used in a WHERE clause to search for a specified pattern in a column.
-- The percent sign % represents zero, one, or multiple characters
-- The underscore sign _ represents one, single character
-- Tip: You can also combine any number of conditions using AND or OR operators.

SELECT * FROM Customers;

SELECT * FROM CUSTOMERS 
WHERE customerName LIKE 'B%' OR customerName LIKE "R%" ;

SELECT * FROM customers
WHERE customerName LIKE '%Inc';

SELECT * FROM customers 
WHERE creditLiMIT NOT LIKE "0%" ;

SELECT * FROM CUstomers
WHERE city LIKE 'nantes';

SELECT * FROM Employees;

SELECT * FROM Employees
WHERE lastname LIKE '%son';

SELECT * FROM employees
WHERE firstName LIKE 'T_M';

SELECT * FROM Employees;

SELECT email FROM employees 
WHERE email LIKE '%com' ;

SELECT email FROM employees 
WHERE email NOT LIKE '%com' ;

SELECT * FROM employees 
WHERE reportsTO LIKE null ; -- not filter

SELECT * FROM products;

SELECT * FROM products 
WHERE productCode LIKE '%\_20%' ; -- use of escape character to search this like pattern

SELECT * FROM PRoducts
WHERE productCode LIKE '%$_20%' ESCAPE '$' ;