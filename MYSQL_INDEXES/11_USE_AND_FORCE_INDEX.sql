/*
USE INDEX hint to instruct the query optimizer to use only a list of named indexes for a query.


Here’s the basic syntax for using the USE INDEX hint:

SELECT select_list
FROM table_name USE INDEX(index_list)
WHERE condition;

*/;
SELECT * FROM customers;

SHOW INDEXES FROm customers;

CREATE INDEX country ON customers(country);
SELECT DISTINCT country FROm customers ;
EXPLAIN SELECT DISTINCT country FROm customers  use index(country) WHERE country = 'USA'; -- query 35 row And result only 1 row 

-- In case the query optimizer ignores the index, you can use the 
-- FORCE INDEX hint to instruct it to use the index instead.

-- some times use index not working it ignores

SELECT DISTINCT country FROm customers ; -- by default it uses index whose cardinality high city_country 98 while country 49
EXPLAIN SELECT DISTINCT country FROm customers ; -- query 98 row And result only 21 row 

-- mention use index(country)
SELECT DISTINCT country FROm customers use index(country) ; -- result row 21
EXPLAIN SELECT DISTINCT country FROm customers use index(country) ; -- query 98 row And result only 21 row 

-- here we can use force index()

SELECT DISTINCT country FROm customers use index(country) ; -- result row 21

EXPLAIN SELECT DISTINCT country FROm customers force index(country) ; -- query 98 row And result only 21 row 


DROP INDEX city_country ON customers;
DROP INDEX city_state_country ON customers;

-- use MySQL FORCE INDEX statement to force the Query Optimizer to use specified named indexes.     

EXPLAIN SELECT productName , buyPrice 
FROM products 
WHERE buyPrice BETWEEN 10 AND 80
ORDER BY buyPrice; -- 110 query 98 result

CREATE INDEX buyprice_index ON products(buyPrice);
SHOW INDEXES FROm products;

EXPLAIN SELECT productName , buyPrice 
FROM products 
WHERE buyPrice BETWEEN 10 AND 80
ORDER BY buyPrice; -- 110 query 98 result

EXPLAIN SELECT productName , buyPrice 
FROM products FORCE INDEX(buyprice_index)
WHERE buyPrice BETWEEN 10 AND 80
ORDER BY buyPrice; -- 110 query 98 result

