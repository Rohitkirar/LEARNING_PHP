-- stored function return single value only so we use stored procedure to return multiple values

-- The user-defined variables, which are preceded by the @ sign, are associated with the database 
-- connection, therefore, they are available for access between the calls.


DELIMITER $$
CREATE PROCEDURE getTotalOrderINEachStatus(
    OUT shipped INT ,
    OUT inprocess INT ,
    OUT resolved INT,
    OUT disputed INT,
    OUT cancelled INT
)
BEGIN
    SELECT COUNT(*) INTO shipped FROM orders WHERE status = 'shipped';
    SELECT COUNT(*) INTO inprocess FROM orders WHERE status = 'in process';
    SELECT COUNT(*) INTO resolved FROM orders WHERE status = 'resolved';
    SELECT COUNT(*) INTO disputed FROM orders WHERE status = 'disputed';
    SELECT COUNT(*) INTO cancelled FROM orders WHERE status = 'cancelled';
END$$

CALL getTotalOrderINEachStatus(@shipped , @inprocess , @resolved , @disputed , @cancelled );
SELECT @shipped , @inprocess , @resolved , @disputed , @cancelled ;


