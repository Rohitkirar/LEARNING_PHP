USE classicmodels;

-- ORDER BY clause used to Sort the resultset in ASC or DESC order

SELECT * FROM customers_100;

SELECT * FROM customers_100 
ORDER BY S_No ; 

SELECT * FROM customers_100
WHERE S_No > 100
ORDER BY first_Name , customer_Id DESC ; 

SELECT First_name , last_name , country 
FROM customers_100 
ORDER BY country , first_name DESC;

--  using orderdetails table

SELECT * FROM orderdetails;

SELECT ordernumber , productcode , priceEach , quantityOrdered*priceEach as totalprice
FROM orderdetails
ORDER BY priceEach DESC , orderNumber DESC ;

-- by ORDER BY clause we can sort by expression also

SELECT * , quantityOrdered*priceEach as totalPrice FROM orderdetails 
ORDER BY quantityOrdered*priceEach DESC  -- totalprice 
LIMIT 10;

-- orders table use

SELECT * FROM Orders;

SELECT DISTINCT status FROM orders;

SELECT orderNumber , customerNumber , status FROM orders
ORDER BY 
FIELD(status , 'Disputed' , 'On Hold' , 'In Process' , 'Resolved' ,'cancelled' , 'Shipped' );


-- In MySQL, NULL comes before non-NULL values. 
-- Therefore, the ORDER BY clause with the ASC option, NULLs appear first in the result set.
-- in DESC order, NULL appear last
-- In MySQL, NULL is lower than non-NULL values

SELECT orderNumber , comments FROM orders 
ORDER BY comments;

SELECT orderNumber , comments FROM orders
ORDER BY comments DESC;
