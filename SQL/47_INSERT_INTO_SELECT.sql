/*IMPORTANT POINTS

    In this syntax, instead of using the VALUES clause, you use a SELECT statement. 
    The SELECT statement may retrieve data from one or more tables.

    Note that the number of columns in the column_list and select_list must be equal.

    The INSERT INTO SELECT statement can very useful when you want to copy data from other tables to a table or 
    to summarize data from multiple tables into a table.

    Please note that it’s possible to select rows in a table and insert them into the same table. 
    In other words, the table_name and another_table in the INSERT INTO ... SELECT statement can reference the same table.
*/

USE classicmodels;

show tables;

DROP TABLE stats, suppliers;

DROP TABLE suppliers;

CREATE TABLE suppliers(
    supplierNumber INT AUTO_INCREMENT,
    supplierName VARCHAR(50) NOT NULL,
    phone VARCHAR(50) ,
    addressLine1 varchar(50),
    addressLine2 VARCHAR(50),
    city VARCHAR(50),
    state VARCHAR(50),
    postalCode VARCHAR(50),
    country VARCHAR(50),
    customerNumber INT,
    PRIMARY KEY(supplierNumber),
    CONSTRAINT uc_all
    UNIQUE(supplierName , phone , customerNumber)
);

-- all customers in California, USA become the company’s suppliers. 
-- The following query finds all customers who are located in California, USA:

SELECT 
    customerNumber,
    customerName,
    phone,
    addressLine1,
    addressLine2,
    city,
    state,
    postalCode,
    country
FROM customers
WHERE
    country = 'USA' AND
    state = 'CA';

 -- Second, insert customers who are located in California USA from the customers table 
 -- into the suppliers table using the INSERT INTO SELECT statement:   

INSERT INTO suppliers(
    supplierName ,
    phone,
    addressline1,
    addressline2,
    city,
    state,
    postalCode,
    country,
    customerNumber
)
SELECT 
    customerName,
    phone,
    addressline1,
    addressline2,
    city,
    state,
    postalCode,
    country,
    customerNumber
FROM
    customers
WHERE 
    country = 'USA' AND
    state = 'CA';


SELECT * FROM suppliers;

-- create table stats and store total products , customers , orders details in it;
CREATE TABLE stats(
    totalproduct INT,
    totalCustomer INT,
    totalOrder INT,
    CONSTRAINT uc_all
    UNIQUE(totalproduct , totalcustomer , totalorder)
) ;

INSERT INTO stats (
    totalproduct,
    totalcustomer,
    totalorder
)
VALUES(
    (SELECT count(*) FROM products),
    (SELECT count(*) FROM customers),
    (SELECT count(*) FROM orders)
);

-- Please note that it’s possible to select rows in a table and insert them into the same table. In other words, 
-- the table_name and another_table in the INSERT INTO ... SELECT statement can reference the same table.

ALTER TABLE stats 
ADD COLUMN total INT GENERATED ALWAYS AS (totalproduct + totalcustomer + totalorder);


SELECT * FROM stats;

-- copy data of one table into another

CREATE TABLE customers2 LIKE customers;

INSERT INTO customers2
SELECT * FROM customers;

SELECT * FROM customers2;



-- Use the MySQL INSERT INTO SELECT statement to insert data into a table from a result set.