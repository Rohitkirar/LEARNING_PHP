/*
* A parameter in a stored procedure has one of three modes: 
    IN, OUT, or INOUT.

* IN(default) -- means call function pass argument to SP. SP works on copy of IN
* OUT : parament can be modified with the SP and its updated value `CreatePersonTable
is then passed back to the calling program
* INOUT is a combination of IN and OUT. it is modify and pass new value to calling program


*/

DELIMITER //

CREATE PROCEDURE GetOfficeByCountry(
    IN countryName Varchar(50)
)
BEGIN
    SELECT * FROM offices WHERE country = countryName;
END //

CALL GetOfficeByCountry('France');

CALL GetOfficeByCountry('USA');

CALL GetOfficeByCountry();


CREATE PROCEDURE GetOrderCountByStatus(
    IN orderStatus VARCHAR(50),
    OUT total INT
)
BEGIN 
    SELECT COUNT(orderNumber) INTO total
    FROM orders WHERE status = orderStatus;
END //

CALL GetOrderCountByStatus('shipped' , @total);

SELECT @total;


CALL GetOrderCountByStatus('In process' , @total);

SELECT @total;

DROP PROCEDURE GetOrderCountByStatus;

-- INOUT 

CREATE PROCEDURE SetCounter(
    INOUT counter INT,
    IN increase INT
)
BEGIN
    SET counter = counter + increase;
END;

SET @counter = 1;

CALL `SetCounter`(@counter , 1);

CALL setCounter(@counter , 5);

SELECT @counter;


DELIMITER;