use classicmodels;

/*
    -> To filter the groups based on the number of items in each group, 
        you use the HAVING clause and the COUNT function.
    -> The reason is that MySQL evaluates the HAVING clause before the SELECT clause. 
        Therefore, at the time MySQL evaluated the HAVING clause, 
        it doesn’t know the column alias count_c2 because it has not evaluated the SELECT clause yet.
    -> 

*/
-- EXAMPLE  : uses the HAVING clause with the COUNT function to get the customers who placed more than four orders

SELECT 
    c.customerNumber,
    c.customerName,
    COUNT(orderNumber) as totalOrder
FROM
    customers AS c 
JOIN
    orders AS  o 
USING
    (customerNumber)
GROUP BY
    CustomerNumber
HAVING 
    -- totalOrder > 4  -- it is not working in sql
    COUNT(orderNumber) > 4