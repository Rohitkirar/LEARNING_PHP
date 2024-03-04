-- Active: 1709188058198@@127.0.0.1@3306@classicmodels
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

DROP TABLE IF EXISTS table1 ,table2;


CREATE TABLE IF NOT EXISTS table1 (
    id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE table2(
    id VARCHAR(20) PRIMARY KEY,
    ref INT NOT NULL
)

INSERT INTO table1
VALUES 
    (1),
    (2),
    (3),
    (4),
    (5),
    (6);


INSERT INTO table2 
    (id , ref)
VALUES
    ('A' , 1),
    ('B' , 2),
    ('C' , 3);


-- delete row where id = 1 from both table1

DELETE 
    table1 , table2 
FROM 
    table1 
JOIN 
    table2 
ON 
    table1.id = table2.ref
WHERE 
    table1.id = 1;

SELECT * FROM table1;

SELECT * FROM table2;


-- delete join with left join : we use this to delete row from table1 that are not present in table2

-- Note that we only put T1 table after the DELETE keyword, not both T1 and T2 tables like we did with the INNER JOIN clause.

DELETE 
    table1
FROM
    table1
LEFT JOIN
    table2
ON table1.id = table2.ref
WHERE ref IS NULL;


SELECT * FROM table1;

SELECT * FROM table2;


CREATE TABLE IF NOT EXISTS TotalCustomers LIKE customers;

desc TOTALcustomers;

INSERT INTO totalcustomers
SELECT * FROM customers;

INSERT INTO totalcustomers
SELECT * FROM customers_archive;

SELECT * FROM totalcustomers;

-- delete customers records from customers who never orderdetails

DELETE 
    totalcustomers
FROM 
    totalcustomers
LEFT JOIN
    orders
USING
    (customerNumber)
WHERE
    orderNumber IS NULL;