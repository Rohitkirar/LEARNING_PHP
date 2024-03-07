/*
 basic syntax of the CREATE PROCEDURE statement:

    CREATE PROCEDURE sp_name(parameter_list)
    BEGIN
        statements;
    END;

* first step : create procedure pro_name()
* second step : (parameter list)
* third : BEGIN and END block; 

f you attempt to create a stored procedure that already exists, MySQL will issue an error.
To prevent the error, you can add an additional clause IF NOT EXISTS after the CREATE PROCEDURE keywords:

Note that the IF NOT EXISTS clause has been available since MySQL version 8.0.29

To execute a stored procedure, you use the CALL statement:

CALL sp_name(argument_list);
*/

DELIMITER //

CREATE PROCEDURE GetAllProducts()
BEGIN
    SELECT * FROM products;
END //

CALL GetAllProducts

DELIMITER;