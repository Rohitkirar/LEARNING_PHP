/*
The CREATE VIEW statement creates a new view in the database. 
Here is the basic syntax of the CREATE VIEW statement:

CREATE [OR REPLACE] VIEW [db_name.]view_name [(column_list)]
AS
  select-statement;

NOTE : Second, use the OR REPLACE option if you want to replace an existing view if the view 
already exists. If the view does not exist, the OR REPLACE has no effect.
*/

CREATE VIEW salePerOrder AS 
SELECT orderNumber , sum(quantityOrdered * priceEach) AS total
FROM orderdetails
GROUP BY orderNumber 
ORDER BY total DESC;

-- if you use the SHOW TABLE command to view all tables in the classicmodels database, you will see the viewsalesPerOrder is showing up in the list.

SHOW TABLES LIKE 'sale%';
SHOW FULL TABLES LIKE 'sale%';

--  Creating a view based on another view example

CREATE VIEW bigSalesOrder AS 
SELECT orderNumber , ROUND(total , 2) as total
FROM salePerOrder WHERE total > 60000;

SELECT * FROM salePerOrder;

-- 3) Creating a view with join example
CREATE OR REPLACE VIEW customerOrders AS
SELECT 
    orderNumber,
    customerName,
    SUM(quantityOrdered * priceEach) total
FROM
    orderDetails
INNER JOIN orders o USING (orderNumber)
INNER JOIN customers USING (customerNumber)
GROUP BY orderNumber;

-- 4) Creating a view with a subquery example

CREATE VIEW aboveAvgProducts AS
SELECT productCode, productName, buyPrice
FROM products
WHERE buyPrice > (SELECT AVG(buyPrice) FROM products)
ORDER BY buyPrice DESC;

-- Creating a view with explicit view columns example
-- This statement uses the CREATE VIEW statement to create a new view 
-- based on the customers and orders tables with explicit view columns:

CREATE VIEW customerOrderStats (customerName , orderCount) AS
SELECT 
customerName, 
COUNT(orderNumber)
FROM customers INNER JOIN orders 
USING (customerNumber)
GROUP BY customerName;



SELECT customerName, orderCount
FROM customerOrderStats
ORDER BY orderCount DESC, customerName;