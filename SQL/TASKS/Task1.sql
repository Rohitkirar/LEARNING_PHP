
USE classicmodels;

SELECT * FROM customers;


-- "<HR> TASK BY SAGAR SIR : state-not null, country = usa, germany, credit limit 50k to 2L, 
-- (cus from first 10 and last 10) apply at end, print cus no., full name, country ,state ,limit :<BR>";

-- "FIRST 10 RECORDS <BR>";

SELECT customernumber, CONCAT(contactfirstName, ' ' , contactlastName) as fullName , state , country , creditlimit
FROM customers
WHERE country IN ('usa' , 'germany') 
AND state IS NOT NULL 
AND creditlimit BETWEEN 50000 AND 200000
ORDER BY customerNumber
LIMIT 10  ;

-- "LAST 10 RECORDS <BR>";

SELECT customernumber, CONCAT(contactfirstName, ' ' , contactlastName) as fullName , state , country , creditlimit
FROM customers
WHERE country IN ('usa' , 'germany') 
AND state IS NOT NULL 
AND creditlimit BETWEEN 50000 AND 200000
ORDER BY customerNumber DESC
LIMIT 10 ;


-- GET customer details with full address and address is not null

SELECT customernumber, customerName, phone , CONCAT(addressLine2 ,', ', state, ', ' , country) as fullAddress
FROM customers
WHERE country = 'USA' AND 
addressLine2 IS NOT NULL AND 
state IS NOT NULL 
ORDER BY customerNumber;

-- get customer details name starting with S and and with Co. and creditLIMIT greater than 20000

SELECT customerName , creditLimit
FROM customers
WHERE (customerName LIKE "S%"
AND customerName LIKE "%Co.")
AND creditLIMIT >= 20000 ;


SELECT * FROM products;

-- get stock details less than 5000 quantity remains  and sort accordingly

SELECT productCode , productName , productLine , productVendor , quantityInStock
FROM products
WHERE 
productLine = 'motorcycles' 
OR productLine = 'classic cars' 
AND quantityInStock <= 5000
ORDER BY productLine,
productVendor ASC,
quantityInStock DESC;

-- get total stock of category by using group by clause;

SELECT productLine , SUM(quantityInStock) as totalStock
FROM products
WHERE 
productLine = 'Motorcycles'
OR productLine = 'classic cars'
GROUP BY productLine
ORDER BY productLine;

SELECT * FROM payments;

-- get customer details who have highest transaction amount top 10 result

SELECT customerNumber , sum(amount) as totalAmount
FROM payments
GROUP BY customerNumber
Order BY totalAmount DESC
LIMIT 10;

-- get customer details with total transaction amount in the year 2005

SELECT customerNumber , sum(amount) as totalAmount , SUBSTR(paymentDate, 1 , 4) as year
FROM payments
WHERE paymentDate BETWEEN '2005-01-01' AND '2005-12-31'  
GROUP BY customerNumber 
ORDER BY paymentDate DESC;


-- get total transaction amount per year data

SELECT sum(amount) as totalAmount , SUBSTR(paymentDate,1 , 4) as year 
FROM payments
GROUP BY year
ORDER BY year DESC;

-- get customer details only from france , spain , sweden whose creditlimit not equal to 0  address is not null

SELECT customerName , creditLimit , CONCAT(addressline1 , ', ' , state , ', ' , country) as fullAddress
FROM customers
WHERE creditLimit != 0 
AND state IS NOT NULL 
AND country IN ('france' , 'spain' , 'japan', 'USA')
ORDER BY FIELD(country ,'france' , 'spain' ,'japan' , 'USA'),
creditLimit DESC;  

SELECT * FROM productlines;

SELECT * FROM employees;

SELECT DISTINCT jobTitle FROM employees;

SELECT employeeNumber , 
CONCAT(firstName , ' ' , lastName) as fullName,
email , 
(SELECT CONCAT(firstName , ' ' , lastName) 
FROM employees 
WHERE employeeNumber = 1002) as reportsTo 
FROM employees 
WHERE officeCode = 1  AND reportsTo = 1002; 

