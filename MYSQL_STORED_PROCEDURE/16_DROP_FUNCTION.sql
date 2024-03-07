/*
Use the DROP FUNCTION statement to drop a stored function.
TO drop a stored function use query

    DROP FUNCTION IF EXISTS function_name;

The IF EXISTS option allows you to conditionally drop a stored function if it exists. 
It prevents an error from arising if the function does not exist.


*/

DELIMITER $$

CREATE FUNCTION OrderLeadTime (
    orderDate DATE,
    requiredDate DATE
) 
RETURNS INT
DETERMINISTIC
BEGIN
    RETURN requiredDate - orderDate;
END$$

DELIMITER ;

-- to drop function we USE

DROP FUNCTION IF EXISTS `OrderLeadTime`;

SHOW warnings; -- shows previous warning MESSAGE
