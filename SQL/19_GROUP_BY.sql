/*
    The GROUP BY clause groups a set of rows into a set of summary rows based on column values or expressions. 
    It returns one row for each group and reduces the number of rows in the result set.

    In this syntax, GROUP BY clause after the FROM and WHERE clauses
    MySQL evaluates the GROUP BY clause after the FROM and WHERE clauses 
    but before the HAVING, SELECT, DISTINCT, ORDER BY and LIMIT clauses:
    
    you often use the GROUP BY clause with aggregate functions such as SUM, AVG, MAX, MIN, and COUNT. 
    The aggregate function that appears in the SELECT clause provides the information for each group.

    The SQL standard does not allow you to use an alias in the GROUP BY clause whereas MySQL supports this.

    If you use the GROUP BY clause in the SELECT statement without using aggregate functions,
    the GROUP BY clause behaves like the DISTINCT clause.

    Notice that MySQL 8.0 or later removed the implicit sorting for the GROUP BY clause. Therefore, 
    if you are using earlier versions, you will find that the result set with the GROUP BY clause is sorted.
*/
USE classicmodels;

-- If you want to group the order statuses, you can use the GROUP BY clause with the status colum

SELECT status FROM orders 
GROUP BY status;
