/*
    MySQL allows you to use the INNER JOIN clause in the DELETE statement 
    to delete rows from one table that has matching rows in another table.

    to delete rows from both T1 and T2 tables that meet a specified condition

    DELETE T1, T2
    FROM T1
    INNER JOIN T2 ON T1.key = T2.key
    WHERE condition;

    We can also use the LEFT JOIN clause in the DELETE statement to delete rows in a table (left table) 
    that does not have matching rows in another table (right table).

    DELETE T1 
    FROM T1
            LEFT JOIN
        T2 ON T1.key = T2.key 
    WHERE
        T2.key IS NULL;
    
*/

use classicmodels;

SHOW TABLES;

CREATE TABLE table1 (
    id INT PRIMARY KEY,
    name Varchar(20) NOT NULL
) ;

CREATE TABLE table2(
    city Varchar(10) ,
    fid INT FOREIGN KEY REFERENCES table1 (id)
);



