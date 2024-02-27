/*
    a temporary table is a special type of table that allows you to store a temporary result set, which you can reuse several times in a single session.
    
    Temporary tables in SQL Server are created in the TempDB database. This database serves as a system repository for temporary user objects, including:
    
    A MySQL temporary table has the following features:

     1) A temporary table is created by using CREATE TEMPORARY TABLE statement.
     2) MySQL removes the temporary table automatically when the session ends or the connection is terminated. 
     3) Also, you can use the  DROP TABLE statement to remove a temporary table explicitly when you are no longer using it.
     4) A temporary table is only available and accessible to the client that creates it. 
     5) Different clients can create temporary tables with the same name without causing errors because only the client that creates the temporary table can see it. 
     6) However, in the same session, two temporary tables cannot share the same name.
     7) A temporary table can have the same name as a regular table in a database. 
     For example, if you create a temporary table named employees in the sample database, 
     the existing employees table becomes inaccessible. 
     Every query you issue against the employees table is now referring to the temporary table employees
*/
USE classicmodels;

-- MySQL CREATE TEMPORARY TABLE statement
-- CREATE TEMPORARY TABLE statement is similar to the syntax of the CREATE TABLE

CREATE TEMPORARY TABLE credits(
    customerNumber INT PRIMARY KEY ,
    creditLimit DECIMAL(10 ,2)
);

-- insert data in temporary table

INSERT INTO credits (customerNUMBER , creditlimit)
SELECT customerNumber , creditlimit 
FROM customers
WHERE creditlimit > 0 ;

-- output data of temporary table

SELECT * FROM credits;

-- drop temporary table 

DROP TEMPORARY TABLE credits;

SELECT * FROM credits;



