/*
    -> The EXCEPT will compare the result of query1 with the result set of query2 and 
       return the rows of the result set of query1 that do not appear in the result set of query2.

    -> The EXCEPT operator uses the DISTINCT option if you omit it. The EXCEPT DISTINCT removes duplicate rows in the result set.
    -> f you want to retain the duplicate rows, you need to specify the ALL option explicitly.
    -> To use the EXCEPT operator, the query1 and query2 need to follow these rules:

        * The order and the number of columns in the select list of the queries must be the same.
        * The data types of the corresponding columns must be compatible.

    ->  EXCEPT operator returns a query set with column names derived from the column names of the first query (query1).
    -> Use the MySQL EXCEPT operator to retrieve rows from one result set that do not appear in another result set.
        
        * EXCEPT DISTINCT removes duplicates while the EXCEPT ALL retains the duplicates.
        * The EXCEPT operator uses the DISTINCT option by default.

        EXCEPT ALL is not supported by mysql
*/

SELECT 
    lastName 
FROM 
    Employees
EXCEPT
SELECT 
    contactlastName 
FROM 
    customers ;



SELECT firstName
FROM employees
EXCEPT
SELECT contactfirstName
FROM customers


SELECT firstName , lastName FROM Employees
EXCEPT
SELECT contactfirstName , contactlastName FROM customers
ORDER BY firstName