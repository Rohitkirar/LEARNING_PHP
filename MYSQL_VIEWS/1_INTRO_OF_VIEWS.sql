/*
a view is a named query stored in the database catalog.

A better way to do this is to save the query in the database server and assign a name to it. 
This named query is called a database view, or simply, view.

To create a new view you use the CREATE VIEW

 a view does not physically store the data. 
 When you issue the SELECT statement against the view, 
 MySQL executes the underlying query specified in the view’s definition 
 and returns the result set. 
 For this reason, sometimes, a view is referred to as a virtual table.
*/;

CREATE VIEW customerPayments
AS 
SELECT customerName , checkNumber , paymentDate , amount 
FROM customers INNER JOIN payments USING(customerNumber); 

SELECT * FROM customerPayments;

DROP VIEW daysofweek;

CREATE VIEW daysofweek  AS
    SELECT 'Mon' 
    UNION 
    SELECT 'Tue'
    UNION 
    SELECT 'Web'
    UNION 
    SELECT 'Thu'
    UNION 
    SELECT 'Fri'
    UNION 
    SELECT 'Sat'
    UNION 
    SELECT 'Sun';


SELECT * FROM daysofweek;