/*
-> Summary

* Use the MySQL ALTER PROCEDURE statement to modify the characteristics
of a stored procedure.
* Drop and recreate a stored procedure to modify its parameters
and body.

characteristic: {
    COMMENT 'string'
  | LANGUAGE SQL
  | { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }
  | SQL SECURITY { DEFINER | INVOKER }
}

NOTE : 
However, it’s important to note that the ALTER PROCEDURE statement 
does not support this. To implement such modifications, you need to:

*Sometimes, you may want to modify a stored procedure by adding or 
removing parameters or even changing its body.

* First, drop the stored procedure using the DROP PROCEDURE statement.

* Second, recreate the stored procedure using the CREATE PROCEDURE statement
*/

ALTER PROCEDURE GetEmployees COMMENT "Get employees";