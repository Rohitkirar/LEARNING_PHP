/*
    -> MySQL UNION operator allows you to combine two or more result sets of queries into a single result set.
        SELECT column_list
        UNION [DISTINCT | ALL]
        SELECT column_list
        UNION [DISTINCT | ALL]
        SELECT column_list
        ... 

    -> these are the basic rules that you must follow:

    * First, the number and the orders of columns that appear in all SELECT statements must be the same.
    * Second, the data types of columns must be the same or compatible.

    NOTE : By default, the UNION operator removes duplicate rows even if you don’t specify the DISTINCT operator explicitly.

    -> If you use the UNION ALL explicitly, the duplicate rows, if available, remain in the result. 
        Because UNION ALL does not need to handle duplicates, it performs faster than UNION DISTINCT .

    -> UNION vs. JOIN
        A JOIN combines result sets horizontally, a UNION appends result set vertically. 

    -> As you can see from the output, the MySQL UNION uses the column names of the first SELECT statement for the column headings of the output.
        If you want to use other column headings, you need to use column aliases explicitly in the first SELECT statement 
    
    -> If you want to sort the result set of a union, you use an ORDER BY clause in the last SELECT statement 

    -> MySQL also provides you with an alternative option to sort a result set based on column position using ORDER BY clause
    NOTE : However, it is not a good practice to sort the result set by column position.
*/

SELECT 
    customerNumber
FROM 
    customers
UNION
SELECT 
    customerNumber
FROM 
    customers_archive
ORDER BY customerNumber
LIMIT 30 ;


SELECT 
    customerNumber
FROM
    customers
UNION
SELECT 
    customerNumber
FROM
    orders
ORDER BY 
    customerNumber
LIMIT 30 ;

SELECT 
    customerNumber 
FROM
    customers
UNION ALL
SELECT 
    customerNumber
FROM orders
ORDER BY
    customerNumber
LIMIT 30 ;

SELECT
    customerNumber,
    customerName
FROM
    customers
UNION ALL
SELECT 
    employeeNumber,
    CONCAT(firstName,' ' , lastName) as employeeName
FROM
    employees
ORDER BY
    customerNumber desc
LIMIT 30 ;

SELECT
    customerNumber as ID,
    customerName as FullName
FROM
    customers
UNION ALL
SELECT 
    employeeNumber,
    CONCAT(firstName,' ' , lastName) as employeeName
FROM
    employees
ORDER BY ID DESC
LIMIT 40;


SELECT
    customerNumber as ID,
    customerName as FullName,
    'customer' AS contactType
FROM
    customers
UNION ALL
SELECT 
    employeeNumber,
    CONCAT(firstName,' ' , lastName) as employeeName,
    'employee' AS contactType
FROM
    employees
ORDER BY ID DESC
LIMIT 40;


SELECT 
    customerNumber as ID,
    customerName as FULLNAME,
    'customer' AS contactType
FROM 
    customers
UNION
SELECT 
    employeeNumber,
    CONCAT(firstName , '  ' , lastName),
    'employee' AS contactType
FROM 
    employees
ORDER BY 2;



