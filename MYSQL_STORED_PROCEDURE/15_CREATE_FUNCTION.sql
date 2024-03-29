
DROP FUNCTION customerLevel;

DELIMITER $$
CREATE FUNCTION customerLevel(
    credit DECIMAL(10,2)
)
RETURNS VARCHAR(20)
BEGIN
    IF (credit >= 100000) THEN
        RETURN 'PLATINIUM';
    ELSEIF (credit >= 50000 AND credit < 100000) THEN
        RETURN 'GOLD';
    ELSEIF (credit >= 30000 AND credit < 50000) THEN
        RETURN 'SILVER';
    ELSE 
        RETURN 'BRONZE';
    END IF;
END ;

DELIMITER ;

-- calling the stored function inside a QUERY

SELECT customerNumber , creditLimit , customerlevel(creditLimit) as customerLevel
FROM customers ;



-- using stored function inside stored procedure
DELIMITER $$
DROP PROCEDURE IF EXISTS getcustomerlevel;
CREATE PROCEDURE getCustomerlevel(
    In pcustomerNumber INT,
    OUT pcustomerLevel Varchar(20)
)
BEGIN
    DECLARE credit DEC(10,2) ;

    SELECT creditlimit INTO credit FROM customers WHERE pcustomerNumber = customerNumber;

    SET pcustomerLevel = customerLeveL(credit); 

END$$
DELIMITER ;

CALL getCustomerlevel(103, @level);
CALL getCustomerlevel(114, @level);

SELECT @level;



-- example to use function inside a trigger before insert to concat the firstname and last NAMe

use classicmodels;
SELECT * FROM customers;

DELIMITER //
CREATE FUNCTION fullName(
firstName varchar(50) , lastName varchar(50)
)
RETURNS varchar(100)
BEGIN
	DECLARE fullName VARCHAR(100);
    SET fullName = CONCAT(firstName , ' ' , lastName);
	RETURN  fullName;
END; //

DELIMITER //
CREATE TRIGGER before_insertion
BEFORE INSERT 
ON new_customers
FOR EACH ROW
BEGIN
	DECLARE full_name varchar(100);
	SET full_name = fullName(new.firstName , new.lastName);
    SET new.full_name = full_name;
END; //

CREATE TABLE new_customers(
	id INT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName Varchar(50) ,
    full_name Varchar(100)
);

INSERT INTO new_customers
	(id , firstName , lastName)
VALUES
	(1 , 'rohit' , 'kirar');
    
SELECT * FROM new_customers;



/*

* A stored function is a reusable and encapsulated piece of code in a database that performs a specific 
task and returns a single value.
* Use the CREATE FUNCTION statement to create a stored function.
* Use stored functions to enhance the modularity and efficiency of 
SQL statements.

NOTE : 
* By default, stored functions consider all parameters as IN parameters
* You cannot specify IN , OUT or INOUT modifiers to parameters
* specify the data type of the return value in the RETURNS statement, 
    which can be any valid MySQL data types.
* you don’t use DETERMINISTIC or NOT DETERMINISTIC, MySQL defaults to the NOT DETERMINISTIC option.
* A deterministic function always returns the same result for the same input parameters, 
    while a non-deterministic function produces different results for the same input parameters.
* need to include at least one RETURN statement. 
* The RETURN statement sends a value to the calling programs.
* RETURN statement, the stored function terminates the execution of the stored function immediately.




SYNTAX 
    DELIMITER $$
    CREATE FUNCTION function_name(
        param1,
        param2,…
    )
    RETURNS datatype
    [NOT] DETERMINISTIC
    BEGIN
    -- statements
    END $$
    DELIMITER ;


*/
