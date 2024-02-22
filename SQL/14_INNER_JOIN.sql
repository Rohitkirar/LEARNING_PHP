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

SELECT employeeNumber , CONCAT(firstName , ' ' , lastName) as fullName , city , state , country
FROM employees
INNER JOIN offices USING(officeCode)
WHERE state IS NOT NULL;

SELECT employeeNumber , CONCAT(firstName , ' ' , lastName) as FullName , city  , state , country 
FROM employees as e 
INNER JOIN offices as o ON e.officeCode = o.officeCode;

-- It is a good practice to include the table name when specifying columns in the SQL statement.
SELECT employees.employeeNumber , employees.firstName , employees.lastName , offices.city , offices.state , offices.country
FROM employees 
INNER JOIN offices
ON employees.officeCode = offices.officeCode
WHERE state IS NOT NULL ;

SELECT e.employeeNumber , e.firstName , e.lastName , o.city , o.state , o.country
FROM employees as e 
JOIN offices as o 
ON e.officeCode = o.officeCode
WHERE state IS NOT NULL
AND country <> 'USA';


SELECT customerNumber , customerName , count(ordernumber) as totalOrder , sum(amount) as totalAmount
FROM customers 
JOIN
orders USING(customerNumber)
JOIN
payments 
USING(customerNumber)
GROUP BY customerNumber
ORDER BY totalOrder DESC;

SELECT * FROM customers 
JOIN
orders USING(customerNumber)
JOIN
payments
USING(customerNumber);

-- BY parenthesis we give preference which table joins first

SELECT * FROM customers;
SELECT * FROM orders;
SELECT * FROM payments;

;



