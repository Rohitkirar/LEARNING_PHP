/*
A functional index is created based on the result of an expression or function applied
to one or more columns in a table.


To create a functional index, you use the CREATE INDEX statement: SYNTAX

CREATE INDEX index_name
ON table_name ((fn));

OR 

Besides the CREATE INDEX statement, you can use the ALTER TABLE statement
to add a functional index to a table:

ALTER TABLE table_name
ADD INDEX index_name((fn));
*/;

-- problem
SELECT count(*) FROM orders WHERE YEAR(ORDERDATE) = 2004; -- 151 result
EXPLAIN SELECT count(*) FROM orders WHERE YEAR(ORDERDATE) = 2004; --row 326 result row 151

-- creating index for orderdate col
CREATE INDEX idx_order_date ON orders(orderDate);

-- works with query 
SELECT COUNT(*) FROM orders WHERE orderdate BETWEEN '2004-01-01' AND '2004-12-31'; -- 151 result
EXPLAIN SELECT COUNT(*) FROM orders WHERE orderdate BETWEEN '2004-01-01' AND '2004-12-31';-- query row 151 and  151 result

-- not working when we use function
-- it is not use using function using in where
SELECT count(*) FROM orders WHERE YEAR(ORDERDATE) = 2004; -- 151 result
EXPLAIN SELECT count(*) FROM orders WHERE YEAR(ORDERDATE) = 2004; --row 326 result row 151


-- to overcome this we can create functional index for COL ;

SELECT ORDERDATE FROM ORDERS;

CREATE INDEX year_index 
ON orders((YEAR(orderDate)));

CREATE INDEX month_index 
ON orders((MONTH(orderDate)));

CREATE INDEX day_index 
ON orders((DAY(orderDate)));