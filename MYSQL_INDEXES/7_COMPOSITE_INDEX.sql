/* DOUBT
A composite index is an index on multiple columns. 
MySQL allows you to create a composite index that consists of up to 16 columns.

NOTE  : 
Notice that if you have a composite index on (c1,c2,c3), 
you will have indexed search capabilities on one of the following column combinations:

(c1)
(c1,c2)
(c1,c2,c3)
*/;
-- creating synatax of compostite index 
;
-- in table creation definition
CREATE TABLE table_name (
    c1 data_type PRIMARY KEY,
    c2 data_type,
    c3 data_type,
    c4 data_type,
    INDEX index_name (c2,c3,c4)
);

-- by create index
CREATE INDEX index_name 
ON table_name(c2,c3,c4);

use classicmodels;

-- EXAMPLE 
SELECT * FROM customers;

EXPLAIN SELECT * FROM customers 
WHERE city = 'San Jose' AND 
state = 'CA' AND 
country = 'usa';;


-- not working only works in seq COL1 , col2 , col3

EXPLAIN;SELECT * FROM customers WHERE country = 'usa'; -- search 98 row result 35

EXPLAIN SELECT * FROM customers 
WHERE state = 'CA' AND country = 'usa'; -- search 98 row result 11

EXPLAIN SELECT * FROM customers WHERE city = 'San Jose';
CREATE INDEX city_state_country 
ON customers(city, state , country);

/*
Summary
Composite indexes are indexes that involve more than one column.
Define composite indexes when your queries involve conditions or sorting on multiple columns.
Using composite indexes properly can significantly improve the performance of queries that filter 
    or sort based on the indexed columns.
*/