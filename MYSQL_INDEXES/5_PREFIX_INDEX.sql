/*
When you create a secondary index for a column, 
MySQL stores the values of the columns in a separate data structure e.g., B-Tree and Hash.

 the maximum prefix length is 767 bytes.
 Now, the query optimizer uses the newly created index which is much faster and 
 more efficient than before.

In this tutorial, you have learned how to use the MySQL prefix index to create 
indexes for string columns.
*/;

use classicmodels;

-- without creating index searched 110 row result 4 row only
EXPLAIN SELECT productName , productCode , productVendor 
FROM products 
WHERE productName LIKE '1970%';


-- witho creating index searched 4 row result 4 row only

CREATE INDEX productName ON products(productName(4));
EXPLAIN SELECT productName , productCode , productVendor 
FROM products 
WHERE productName LIKE '1970%';
