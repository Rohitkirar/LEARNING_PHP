/*
MYSQL AFTER UPDATE TRIGGER

MySQL AFTER UPDATE triggers are invoked automatically after an update event occurs 
on the table associated with the triggers.

SYNTAX : 
    CREATE TRIGGER trigger_name
    AFTER UPDATE
    ON table_name FOR EACH ROW
    trigger_body

Note that the OLD represents the values of columns before the UPDATE whereas the 
NEW represents the values of columns after the UPDATE.
*/

USE classicmodels;

DROP TABLE IF EXISTS Sales;

CREATE TABLE Sales(
    id INT AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(100) NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    fiscalYear SMALLINT NOT NULL CHECK(fiscalYear BETWEEN 2000 AND 2050),
    fiscalMonth SMALLINT NOT NULL CHECK(fiscalMonth >=1 AND fiscalMonth <= 12),
    UNIQUE(product , fiscalYear , fiscalMonth)
);

INSERT INTO Sales(product, quantity, fiscalYear, fiscalMonth)
VALUES
    ('2001 Ferrari Enzo',140, 2021,1),
    ('1998 Chrysler Plymouth Prowler', 110,2021,1),
    ('1913 Ford Model T Speedster', 120,2021,1);


SELECT * FROM sales;

DROP TABLE IF EXISTS SalesChanges;

CREATE TABLE SalesChanges(
    id INT AUTO_INCREMENT PRIMARY KEY,
    salesId INT ,
    beforeQuantity INT,
    afterQUantity INT,
    changedAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DELIMITER //
CREATE TRIGGER after_sales_update
AFTER UPDATE 
ON sales FOR EACH ROW
BEGIN 
    IF (old.quantity <> new.quantity) THEN
        INSERT INTO saleschanges(salesId , beforeQuantity , afterQuantity)
        VALUES(old.id , old.quantity , new.quantity);
    END IF;
END //

DELIMITER ;

UPDATE SALES
SET quantity = 350 WHERE id = 1;

UPDATE SALES
SET quantity = CAST(quantity*1.1 AS UNSIGNED);

SELECT * FROM sales;

SELECT * FROM salesChanges;


