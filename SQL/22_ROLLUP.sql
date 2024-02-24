USE classicmodels;
/* 
 If you want to generate two or more grouping sets together in one query, you may use the UNION ALL operator
 Because the UNION ALL requires all queries to have the same number of columns, 
 we added NULL in the select list of the second query to fulfill this requirement.
 The NULL in the productLine column identifies the total super-aggregate line.
 This query can generate the total order values by product lines and also the grand total row. However, it has two problems
 The query is quite lengthy.

 The performance of the query may not be good since the database engine has to internally execute 
 two separate queries and combine the result sets into one.

 To fix these issues, you can use the ROLLUP clause.
 The ROLLUP clause is an extension of the GROUP BY clause 
    
    SELECT 
        select_list
    FROM 
        table_name
    GROUP BY
        c1, c2, c3 WITH ROLLUP;

    IMP NOTE : ROLLUP clause generates not only the subtotals but also the grand total of the order values.

    The ROLLUP generates multiple grouping sets based on the columns or expressions specified in the GROUP BY clause.
    
    GROUP BY c1, c2, c3 WITH ROLLUP

    The ROLLUP assumes that there is the following hierarchy:

    c1 > c2 > c3

    If you have two columns specified in the GROUP BY clause:

    GROUP BY c1, c2 WITH ROLLUP
    Code language: SQL (Structured Query Language) (sql)
    then the ROLLUP generates the following grouping sets:

    (c1, c2)
    (c1)
    ()

    To check whether NULL in the result set represents the subtotals or grand totals, 
    you use the GROUPING() function.

    The GROUPING() function returns 1 when NULL occurs in a supper-aggregate row, 
    otherwise, it returns 0.

    The GROUPING() function can be used in the select list, HAVING clause, and (as of MySQL 8.0.12 ) ORDER BY clause.

*/

SELECT 
    od.orderNumber,
    YEAR(orderdate) as year,
    SUM(quantityOrdered * priceEach)
FROM 
    orders as o 
JOIN 
    orderdetails as od
USING
    (orderNumber)
GROUP BY 
    year, orderNumber  with ROLLUP;
    
    
SELECT 
    productline,
    YEAR(orderdate) as year,
    SUM(quantityOrdered * priceEach) as total,
    GROUPING(productline) as gp,
    GROUPING(year) as gpp
FROM
    orders
JOIN 
    orderdetails
USING
    (orderNumber)
JOIN
    products
USING
    (productCode)
GROUP BY
    productline,
    year
    WITH ROLLUP ;