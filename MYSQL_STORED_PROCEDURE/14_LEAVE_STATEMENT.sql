/*
Use the MySQL LEAVE statement to exit a stored procedure or terminate a loop.
LEAVE statement is used to exit the stored PROCEDURE
LEAVE is similar like break keyword

syntax
     LEAVE label_name;

        CREATE PROCEDURE sp_name()
        sp: BEGIN
        IF condition THEN
            LEAVE sp;
        END IF;
        -- other statement
        END$$

NOTE : 
The LEAVE statement allows you to terminate a loop. 
The general syntax for the LEAVE statement when used in the LOOP, REPEAT and WHILE statements.
*/

CREATE PROCEDURE procedureName(
    inCustomerNumber int
)
sp: BEGIN
    
    DECLARE customerCount INT;
    
    --//statements to EXECUTE

    IF condition THEN
        LEAVE sp;
    END IF;
END;
