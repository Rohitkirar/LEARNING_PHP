USE classicmodels;

/*
    -> HAVING clause is used in conjunction with the GROUP BY clause to filter the groups based on a specified condition.
    -> HAVING clause allows you to apply a condition to the groups returned by the GROUP BY clause and only include groups that meet the specified condition.
    -> The HAVING clause evaluates each group returned by the GROUP BY clause. If the result is true (1), it includes the group in the result set.
    -> It’s possible to form a complex condition in the HAVING clause using logical operators such as OR and AND.
    -> If you omit the GROUP BY clause, the HAVING clause behaves like the WHERE clause.

    -> HAVING clause was added to SQL because the WHERE keyword cannot be used with aggregate functions.

    -> The HAVING clause is only useful when you use it with the GROUP BY clause to generate the output of the high-level reports.

*/

-- uses the GROUP BY clause to get order numbers, the number of items sold per order, and total sales for each from the orderdetails table: 


SELECT 
    o.orderNumber , 
    SUM(quantityOrdered) as totalItems , 
    SUM(quantityOrdered*priceEach) as totalprice
FROM 
    orders AS o
JOIN 
    orderdetails AS od
USING
    (orderNumber)
GROUP BY
    orderNumber
HAVING totalItems > 500;


-- uses the GROUP BY clause to get order numbers, the number of items sold per order, and total sales for each from the orderdetails table

SELECT 
    o.orderNumber , 
    SUM(quantityOrdered) as totalItems , 
    SUM(quantityOrdered*priceEach) as totalprice
FROM 
    orders AS o
JOIN 
    orderdetails AS od
USING
    (orderNumber)
GROUP BY
    orderNumber
HAVING 
    totalItems > 500
AND
    totalprice > 50000;


-- find all orders that already shipped and have a total amount greater than 1500, you can join the orderdetails table with the orders table using the INNER JOIN

SELECT 
    o.orderNumber,
    status,
    SUM(quantityOrdered*priceEach) AS total
FROM 
    orders AS o
JOIN 
    orderdetails AS od
ON 
    o.orderNumber = od.orderNumber
AND
    o.status = 'shipped'
GROUP BY
    o.orderNumber
HAVING
    total > 50000
AND
    orderNumber BETWEEN 10100 AND 10200;

-- lists the number of customers in each country. Only include countries with more than 5 customers:

SELECT 
    country,
    COUNT(customerNumber) AS totalcustomers
FROM 
    customers
GROUP BY
    country
HAVING 
    totalcustomers > 5
ORDER BY
    totalcustomers DESC

-- EXAMPLE 5 : lists the employees that have registered more than 10 orders 

SELECT 
    employeeNumber,
    CONCAT(firstName , ' ' , lastName) As EmpfullName,
    COUNT(orderNumber) as TotalOrder
FROM 
    employees AS e
JOIN
    customers AS c
ON 
    e.employeeNumber = c.salesRepEmployeeNumber
JOIN 
    orders AS o
USING
    (customerNumber)
GROUP BY 
    employeeNumber
HAVING
    TotalOrder > 10 

-- EXAMPLE 6 : lists if the employees "Davolio" or "Fuller" have registered more than 25 orders

SELECT 
    employeeNumber,
    lastName,
    COUNT(orderNumber) as totalOrder
FROM 
    employees AS e
JOIN
    customers AS c
ON 
    e.employeeNumber = c.salesRepEmployeeNumber
JOIN 
    orders AS o
USING 
    (customerNumber)
WHERE 
    lastName NOT IN ('Davolio' , 'fuller')
GROUP BY
    employeeNumber ,
    lastName
HAVING 
    totalOrder > 25 ;