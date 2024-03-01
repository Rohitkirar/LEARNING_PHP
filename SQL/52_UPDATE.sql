/*
    updating data is one of the most important tasks when you work with the database

    The UPDATE statement updates data in a table. 
    It allows you to change the values in one or more columns of a single row or multiple rows.
    
    SYNTAX
        UPDATE [LOW_PRIORITY] [IGNORE] table_name 
        SET 
            column_name1 = expr1,
            column_name2 = expr2,
            ...
        [WHERE
            condition];

    *IMP : The LOW_PRIORITY modifier instructs the UPDATE statement to delay the update until there is no connection reading data from the table. 
    The LOW_PRIORITY takes effect for the storage engines that use table-level locking only such as MyISAM, MERGE, and MEMORY.
    
    The IGNORE modifier enables the UPDATE statement to continue updating rows even if errors occurred. 
    The rows that cause errors such as duplicate-key conflicts are not updated.


*/

USE classicmodels;

SHOW TABLES;


SELECT firstName , lastName , email
FROM employees
WHERE employeeNumber = 1056;


-- update Mary Patterson to the new email mary.patterso@classicmodelcars.com.

UPDATE employees
SET email = 'mary.patterson@classicmodelcars.com'
WHERE employeeNumber = 1056;


-- update values in multiple columns

UPDATE employees
SET lastName = 'Hill',
    email = 'mary.Hill@classicmodelcars.com'
WHERE employeeNumber = 1056;

-- MySQL UPDATE to replace string example

SELECT email
FROM employees
WHERE jobTitle = 'Sales Rep' AND officeCode = 6;

UPDATE employees
SET email = (REPLACE(email , '@classicmodelcars.com' , '@gmail.com'))
WHERE jobTitle = 'Sales Rep' AND
    officeCode = 6 ;


SELECT 
    customerName,
    SalesRepEmployeeNumber
FROM 
    customers_archive
WHERE
    SalesRepEmployeeNumber IS NULL;

-- we can select a random employee whose job title is Sales Rep from the  employees table and update it for the  employees table.

SELECT 
    employeeNumber
FROM 
    employees
WHERE 
    jobTitle = 'Sales Rep'
ORDER BY RAND()
LIMIT 1; 

UPDATE customers_archive
SET salesRepEmployeeNumber = (
    SELECT 
        employeeNumber
    FROM employees
    WHERE 
        jobTitle = 'Sales Rep'
    ORDER BY RAND() -- every customer get random employeeNumber
    LIMIT 1
)
WHERE 
    salesRepEmployeeNumber IS NULL ;


SELECT 
    customerName,
    SalesRepEmployeeNumber
FROM
    customers_archive;





