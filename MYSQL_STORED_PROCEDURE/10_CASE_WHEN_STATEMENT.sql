/*
Besides the IF statement, MySQL provides an alternative conditional statement called the CASE statement used in stored procedures. 
The CASE statements make the code more readable and efficient

The CASE statement has two forms:

Simple CASE statement
Searched CASE statement.

CASE statement tests for equality ( =), therefore, you cannot use it to test equality with NULL 
because NULL = NULL returns FALSE.
*/

-- EXAMPLE country wise shipping date SP

CREATE PROCEDURE GetCustomerShipping(
    IN pcustomerNumber INT ,
    OUT pshipping Varchar(50)
)
BEGIN 
    DECLARE customerCountry Varchar(50);

    SELECT country INTO customerCountry
    FROM customers
    WHERE customerNumber  = pcustomerNumber;

    CASE customerCountry
        WHEN 'USA' THEN 
            SET pshipping  = '2-day Shipping';
        WHEN 'canada' THEN
            SET pshipping = '3-day Shipping';
        WHEN 'France' THEN 
            SET pshipping = '4-day Shipping';
        ELSE
            SET pshipping = '5-day Shipping';
    END CASE;
END;

call GetCustomerShipping(103 , @shipping);
call GetCustomerShipping(104 , @shipping);
call GetCustomerShipping(105 , @shipping);
call GetCustomerShipping(114 , @shipping);

SELECT @shipping;


-- BY date diff of shippeddate and required data , find delivery STATUS

CREATE PROCEDURE getDeliverystatus(
    IN porderNumber INT ,
    OUT pdeliverystatus VARCHAR(50)
)
BEGIN
    Declare days INT ;
    
    SELECT DATEDIFF(shippeddate , requireddate) INTO days
    FROM orders 
    WHERE orderNumber = porderNumber;

    CASE 
        WHEN days < 0 THEN 
            SET pdeliverystatus = 'EARLY';
        WHEN days = 0  THEN 
            SET pdeliverystatus = 'On time';
        WHEN days >= 1 and days <= 5 THEN
            SET pdeliverystatus = 'Late';
        WHEN days > 5 THEN  
            SET pdeliverystatus = 'Too Late';
        ELSE    
            SET pdeliverystatus = 'No information found';  
    END CASE ;
END ;

CALL getDeliverystatus( 10100 , @status);
CALL getDeliverystatus( 10101 , @status);
CALL getDeliverystatus( 10102 , @status);
CALL getDeliverystatus( 10165 , @status);

SELECT @status;

select * FROM orders WHERE DATEDIFF(shippedDate , requiredDate)>0;


-- conditional statement in simple SQL

SELECT customerNumber , customerName , 
CASE 
    WHEN creditLimit > 100000 THEN 'plantinum'    
    WHEN creditLimit > 50000 THEN 'gold'    
    WHEN creditLimit > 30000 THEN 'silver'    
    ELSE 'bronze'
    END as customerlevel
FROM customers;

SELECT customerNumber , customerName , 
CASE country
    WHEN 'India' THEN 'A'    
    WHEN 'USA' THEN 'B'    
    WHEN  'FRANCE' THEN 'C'    
    ELSE 'D'
END  as countrycategory
FROM customers ;


SELECT customerNumber , customerName , 
IF(country='India' , 'A' , 'D') AS countrycategory
FROM customers ;