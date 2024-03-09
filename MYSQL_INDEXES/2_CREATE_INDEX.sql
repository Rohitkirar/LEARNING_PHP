/*
A database index enhances retrieval speed but comes with the cost of increased writing
overhead.
Use the CREATE INDEX statement to create a new index for a table.
*/

-- the following statement creates a new table with an index that consists of two columns c2 and c3.
USE classicmodels;

-- without creating index for city
EXPLAIN SELECT * FROM customers where city = 'NYC'; -- search 98 result 5 row only

-- creating index for city

CREATE INDEX city ON customers(city);

EXPLAIN SELECT * FROM customers WHERE city = 'NYC'; -- search 5 rows result 5row 


-- without creating index for country
EXPLAIN SELECT * FROM customers where country = 'USA'; -- search 98 result 35 row only

-- creating index for country
CREATE INDEX country ON customers(country);

EXPLAIN SELECT * FROM customers WHERE  country = 'USA'; -- search 35 rows result 35 row row 

SHOW INDEXES FROM customers;

DROP INDEX city ON customers;
DROP INDEX country ON customers;

-- multiple col index creation
CREATE INDEX city_country ON customers(city , country); -- doubt

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


