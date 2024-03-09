/*
A database index enhances retrieval speed but comes with the cost of increased writing
overhead.
Use the CREATE INDEX statement to create a new index for a table.
*/

-- the following statement creates a new table with an index that consists of two columns c2 and c3.
USE classicmodels;
CREATE TABLE t(
    c1 int primary key , 
    c2 int not null,
    c3 int not null,
    index (c2 , c3)
);

-- to add index for a column or set of column you use the create index STATEMENt

CREATE INDEX index_name 
ON table_name (col_list);


EXPLAIN SELECT employeeNumber , lastName , firstName
FROM employees
WHERE jobTitle = 'sales Rep';

CREATE INDEX jobtitle ON employees(jobtitle);


SELECT * FROM customers
WHERE salesRepEmployeeNumber = 1370;

EXPLAIN SELECT * FROM customers
WHERE salesRepEmployeeNumber = 1370;

CREATE INDEX salesRepIndex ON customers(salesRepEmployeeNumber);


-- to show all INDEXES
SHOW INDEXES FROM employees;


