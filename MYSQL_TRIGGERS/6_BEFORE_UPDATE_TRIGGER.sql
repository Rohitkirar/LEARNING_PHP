/*
MYSQL BEFORE UPDATE TRIGGER

BEFORE UPDATE triggers are invoked automatically before an update event occurs on the table
associated with the triggers.

SYNTAX 
    CREATE TRIGGER trigger_name
    BEFORE UPDATE
    ON table_name FOR EACH ROW
    trigger_body

In a BEFORE UPDATE trigger, you can update the NEW values but cannot update the OLD values.
*/

USE classicmodels;

DROP TABLE IF EXISTS sales;

CREATE TABLE sales(
    id INT AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(100) NOT NULL,
    quantity INT NOT NULL DEFAULT 0 ,
    fiscalYear SMALLINT NOT NULL CHECK(fiscalYear BETWEEN 2000 and 2050),
    fiscalMonth SMALLINT NOT NULL CHECK(fiscalMonth >=1 AND fiscalMonth <= 12),
    UNIQUE(product , fiscalYear , fiscalMonth)
);

INSERT INTO sales(product, quantity, fiscalYear, fiscalMonth)
VALUES
    ('2003 Harley-Davidson Eagle Drag Bike',120, 2020,1),
    ('1969 Corvair Monza', 150,2020,1),
    ('1970 Plymouth Hemi Cuda', 200,2020,1);

DELIMITER //
CREATE TRIGGER before_sales_update
BEFORE UPDATE
ON sales FOR EACH ROW
BEGIN
    DECLARE errormsg VARCHAR(300) ;
    SET errormsg = CONCAT('THe new quantity ' , NEW.quantity , ' cannot be 3 times greater then ' , OLD.quantity);
    
    IF (new.quantity > old.quantity * 3) THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = errormsg;
    END IF;
END //
DELIMITER ;

UPDATE sales SET quantity = 150 WHERE id = 1;
-- it works fine 

UPDATE sales SET quantity = 750 WHERE id = 1;
-- error THe new quantity 750 cannot be 3 times greater then 150

