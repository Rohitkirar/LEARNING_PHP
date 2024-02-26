USE classicmodels;

/*
    IN vs EXISTS() in where

    The query that uses the EXISTS operator is much faster than the one that uses the IN operator.

    The reason is that the EXISTS operator works based on the “at least found” principle. 
    The EXISTS stops scanning the table when a matching row is found.

    On the other hand, when the IN operator is combined with a subquery, 
    MySQL must process the subquery first and then use the result of the subquery to process the whole query.

    The general rule of thumb is that if the subquery contains a large volume of data, the EXISTS operator provides better performance.

    However, the query that uses the IN operator will perform faster if the result set returned from the subquery is very small.
*/

UPDATE employees
SET
    extension = CONCAT(extension , '1')
WHERE 
        EXISTS(
            SELECT 1 FROM offices
            WHERE employees.officeCode = offices.officeCode 
            AND city = 'San Francisco'
            );
            
SELECT 
	extension
FROM 
	employees
WHERE EXISTS(
            SELECT 1 FROM offices
            WHERE employees.officeCode = offices.officeCode 
            AND city = 'San Francisco'
            );
            
SELECT * 
FROM
        customers
WHERE
        NOT EXISTS(
            SELECT 1
            FROM orders
            WHERE orders.customerNumber = customers.customerNumber
        );
        
CREATE TABLE customers_archive LIKE customers;

INSERT INTO customers_archive 
SELECT * 
FROM
        customers
WHERE
        NOT EXISTS(
            SELECT 1
            FROM orders
            WHERE orders.customerNumber = customers.customerNumber
        );

SELECT * FROM customers_archive;
            
-- One final task in archiving the customer data is to delete the customers
-- that exist in the customers_archive table from the customers table.
SELECT * FROM customers; -- 122 rows before deletion

DELETE FROM 
	customers
WHERE EXISTS(
	SELECT 1 FROM customers_archive as ca 
    WHERE ca.customerNumber = customers.customerNumber
    );
    
SELECT * FROM customers; -- 98 rows after deletion

-- MySQL EXISTS operator vs. IN operator

SELECT * 
FROM customers
WHERE
customerNumber IN (
    SELECT 
        orders.customerNumber FROM orders
    WHERE 
        orders.customerNumber = customers.customerNumber
)
LIMIT 20;


            
SET sql_safe_updates = 0 ;

SET sql_safe_updates = 1 ;
