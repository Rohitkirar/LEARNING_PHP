/*
A variable is a named data object whose value can change 
during the execution of a stored procedure.

Typically, you use variables to hold immediate results. 
These variables are local to the stored procedure.

To declare variable use DECLARE keyword

*/
-- SYNTAX

DECLARE totalSale DEC(10,2) DEFAULT 0.00 ; -- works inside procedure ONLY

-- two variable defining

DECLARE totalQty , stockCount INT DEFAULT 0 ;

-- NOTE As of MySQL 8.0.34, 
-- it is not possible to declare multiple variables 

DECLARE amount DECMIAL(10,2);
DECLARE currency CHAR(3) DEFAULT 'USD';

-- SET statement is used to assign value to VARIABLES

SET totalQty = 10;

-- the value to variable is also set using SELECT INTO
SELECT count(*) into stockCount FROM products;

-- A variable whose name begins with the @ sign is a session variable, 
-- available and accessible until the session ends.

DROP PROCEDURE IF EXISTS `GetTotalOrder`;

CREATE PROCEDURE GetTotalOrder()
BEGIN
    DECLARE totalOrder INT DEFAULT 0 ;

    SELECT COUNT(*) INTO totalOrder FROM orders;

    SELECT totalOrder;
END;

CALL getTotalOrder();