/*
    MySQL REPLACE statement to insert or update data in database tables.

    The MySQL REPLACE statement is an extension to the SQL Standard. The MySQL REPLACE statement works as follows:

    Step 1. Insert a new row into the table, if a duplicate key error occurs.

    Step 2. If the insertion fails due to a duplicate-key error occurs:

    Delete the conflicting row that causes the duplicate key error from the table.
    Insert the new row into the table again.

    To determine whether the new row that already exists in the table, MySQL uses PRIMARY KEY or UNIQUE KEY index. If the table does not have one of these indexes, 
    the REPLACE statement works like an INSERT statement.

    REPLACE [INTO] table_name(column_list)
    VALUES(value_list);

    he following illustrates how to use the REPLACE statement to update data:

    REPLACE INTO table
    SET column1 = value1,
        column2 = value2;

    This statement is like the UPDATE statement except for the REPLACE keyword. In addition, it has no WHERE clause.
    Unlike the UPDATE statement, if you don’t specify the value for the column in the SET clause, the REPLACE statement will use the default value of that column.

    The following illustrates the REPLACE statement that inserts data into a table with the data coming from a query.

    REPLACE INTO table_1(column_list)
    SELECT column_list
    FROM table_2
    WHERE where_condition;
*/

use classicmodels;

SHOW TABLES;

DROP TABLE IF EXISTS cities;

CREATE TABLE cities(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    population INT NOT NULL
);

INSERT INTO cities 
    (name , population)
VALUES
    ('New York' , 100000),
    ('Los Angeles' , 300000),
    ('San Diego' , 200000);

SELECT * FROM cities;

-- use the REPLACE statement to update the population of the Los Angeles city to 370000.

REPLACE INTO cities
    (id , population)
VALUES
    (2 , 370000);

--  REPLACE statement to update a row

REPLACE INTO cities
SET id = 4,
    name = 'Roman' ,
    population = 150000;

REPLACE INTO cities
SET id = 4,
    name = 'Roman' ,
    population = 170000;


-- MYSQL REPLACE to insert data using select STATEMENT

REPLACE INTO cities
    (name , population)
SELECT 
    name ,
    population
FROM cities
Where id = 1;

SELECT * FROM cities;

