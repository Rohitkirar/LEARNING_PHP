/*
 MySQL has an IF() function that differs from the IF statement 
 
* The IF statement has three forms:
* IF..THEN  : Evaluate one condition and execute codeblock if cond is true
* IF..THEN..ELSE : Evalute one condition and execute a code block if the condition is true, otherwise execute another code block
* IF..THEN..ELSEIF..ELSE : evaluate multiple condition and execute a code block if a conditon is true

*/
-- SYNTAX 
IF condition THEN 
    -- statements
END IF;

DROP PROCEDURE IF EXISTS getCustomerLevel;

CREATE PROCEDURE getCustomerLevel(
    IN p_customerNumber INT ,
    OUT p_customerLevel VARCHAR(50)
)
BEGIN
    DECLARE totalcredit INT DEFAULT 0;

    SELECT creditLimit INTO totalcredit
    FROM customers 
    WHERE customerNumber = p_customerNumber;

    IF totalcredit > 50000 THEN 
    SET p_customerLevel = 'GOLD';
    END IF ;
END ;

CALL getCustomerLevel(114 , @customerLevel);

SELECT @customerLevel;

CALL getCustomerLevel(103 , @customerLevel);

SELECT @customerLevel;

SELECT * FROM customers;


-- IF-THEN-ELSE SYNTAX 
IF condition THEN
   -- statements
ELSE
   -- else-statements
END IF;

DROP PROCEDURE IF EXISTS GetCustomerLevel;

CREATE PROCEDURE getCustomerLevel(
    IN p_customerNumber INT , OUT p_customerLevel VARCHAR(50)
)
BEGIN
    DECLARE totalcredit INT  DEFAULT 0;

    SELECT creditLimit INTO totalcredit
    FROM customers 
    WHERE customerNumber = p_customerNumber;

    IF totalcredit > 50000 THEN
        SET p_customerLevel = 'GOLD';
    ELSE  
        SET p_customerLevel = 'Bronze';
    END IF;
END ;

CALL getCustomerLevel(103 , @level);
SELECT @level;

CALL getCustomerLevel(114 , @level);
SELECT @level;


-- IF-THEN-ELSEIF-ELSE SYNTAX

IF condition THEN
   -- statements;
ELSEIF elseif-condition THEN
   -- statements;
...
ELSE
   -- statements;
END IF;


DROP PROCEDURE IF EXISTS getCustomerLevel;

CREATE procedure getcustomerlevel(
    IN p_customerNumber INT ,
    OUT p_customerLevel VARCHAR(50) 
)
BEGIN
    DECLARE totalcredit INT DEFAULT 0;

    SELECT creditlimit INTO totalcredit
    FROM customers
    WHERE customerNumber = p_customerNumber;

    IF totalcredit > 50000 THEN
        SET p_customerLevel = 'GOLD';
    ELSEIF totalcredit > 30000 AND totalcredit < 50000 THEN
        SET p_customerLevel = 'Silver';
    ELSE    
        SET p_customerLevel = 'BRONZE';
    END IF;
END;

CALL getcustomerlevel(114 , @level);

SELECT @level;

CALL getcustomerlevel(114 , @level);

SELECT @level;

SELECT * FROM customers;













