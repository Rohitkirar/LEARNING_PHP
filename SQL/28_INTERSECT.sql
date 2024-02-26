/*
    -> INTERSECT operator is a set operator that returns the common rows of two or more queries.
    -> The INTERSECT operator compares the result sets of two queries and returns the common rows.
    -> To use the INTERSECT operator for the queries, follow these rules:
        * The order and the number of columns in the select list of the queries must be the same.
        * The data types of the corresponding columns must be compatible.

    -> The INTERSECT operator uses the DISTINCT by default. This means that the DISTINCT removes duplicates from either side of the intersection. If you want to retain duplicates, you explicitly specify the ALL option.

    -> Summary
        * Use the MySQL INTERSECT operator to find the rows that are common to multiple query results.
        * Use INTERSECT DISTINCT to remove the duplicates from the result sets and INTERSECT ALL to retain the duplicates.
        * The INTERSECT operator uses DISTINCT by default.

*/

SELECT 
    firstName
FROM
    employees
INTERSECT
SELECT 
    contactfirstName
FROM 
    customers
ORDER BY firstName ;


SELECT 
    firstName
FROM
    employees
INTERSECT
SELECT 
    contactfirstName
FROM 
    customers;