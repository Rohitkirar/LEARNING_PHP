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
*/