/*
    -> A MySQL subquery is called an inner query whereas the query that contains the subquery is called an outer query.
    -> A subquery can be used anywhere that expression is used and must be closed in parentheses.
    -> You can use comparison operators e.g., =, >, < to compare a single value returned by the subquery with the expression in the WHERE clause.

    -> When you use a subquery in the FROM clause, the result set returned from a subquery is used as a temporary table. 
        This table is referred to as a derived table or materialized subquery.

    -> both the outer query and correlated subquery reference the same products table. 
        Therefore, we need to use a table alias p1 for the products table in the outer query.

    -> When a subquery is used with the EXISTS or NOT EXISTS operator, a subquery returns a Boolean value of TRUE or FALSE.  
        The following query illustrates a subquery used with the EXISTS operator:
        SELECT 
            *
        FROM
            table_name
        WHERE
            EXISTS( subquery );

        the query above, if the subquery returns any rows, EXISTS subquery returns TRUE, otherwise, it returns FALSE.
        The EXISTS and NOT EXISTS are often used in the correlated subqueries.
*/

SELECT 
    employeeNumber,
    firstName,
    lastName,
    officecode
FROM
    employees
WHERE 
    officeCode 
IN  (
    SELECT officeCode
    FROM offices
    WHERE country = 'USA'
);

--  following query returns the customer who has the highest payment. 

SELECT 
    customerNumber,
    checkNumber,
    paymentDate,
    amount
FROM
    payments
WHERE
    amount = (
        SELECT 
            MAX(amount) 
        FROM 
            payments
    );

--following query returns the customer who has the  payment above the avg. 

SELECT 
    customerNumber,
    checkNumber,
    paymentDate,
    amount
FROM
    payments
WHERE
    amount > (
        SELECT 
            AVG(amount) 
        FROM 
            payments
    )
LIMIT 30;

--  you can use a subquery with NOT IN operator to find the customers who have not placed any orders as

SELECT 
    customerNumber, 
    CustomerName
FROM
    customers
WHERE
    customerNumber NOT IN (
        SELECT DISTINCT customerNumber FROM orders
    );

-- following subquery finds the maximum, minimum, and average number of items in sale orders:

SELECT 
    MAX(items),
    MIN(items),
    AVG(items)                              
FROM
    (
        SELECT orderNumber,
                COUNT(ordernumber) as items
        FROM 
                orderdetails
        GROUP BY 
            orderNumber 
    ) AS TempTable ;

-- example uses a correlated subquery to select products whose buy prices are greater than the average buy price of all products in each product line.

SELECT 
    productname,
    buyprice
FROM
    products AS p1
WHERE
        buyprice > (
            SELECT AVG(buyprice)
            FROM products
            WHERE  productline = p1.productline
        );
    
--  following query finds sales orders whose total values are greater than 60K..

SELECT 
    orderNumber,
    SUM(quantityOrdered * priceEach) AS total
FROM 
    orders
JOIN 
    orderdetails
USING
    (orderNumber)
GROUP BY 
    orderNumber
HAVING 
    total>60000;

-- correlated subquery to find customers who placed at least one sales order with a total value greater than 60K by using the EXISTS operator: 

SELECT 
    customerNumber, 
    customerName
FROM
    customers
WHERE
EXISTS( 
    SELECT 
        orderNumber, 
        SUM(priceEach * quantityOrdered) AS total
    FROM
        orderdetails
            JOIN
        orders 
    USING 
        (orderNumber)
    WHERE
        customerNumber = customers.customerNumber
    GROUP BY 
        orderNumber
    HAVING 
        total > 60000);

-- fetch the first and last names of customers who have placed at least one order.

SELECT 
    customerNumber ,
    customerName
FROM 
    customers AS c
WHERE EXISTS(
    SELECT orderNumber
    FROM orders AS o
    WHERE c.customerNumber = o.customerNumber
    AND o.customerNumber > 400  ;
    
