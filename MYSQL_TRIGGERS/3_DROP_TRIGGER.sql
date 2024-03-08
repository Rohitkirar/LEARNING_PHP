/*
* DROP TRIGGER STATEMENT_
DROP TRIGGER statement delete a trigger from the database;

SYNTAX :
DROP TRIGGER [IF EXISTS] [schema_name.]trigger_name;

Note that if you drop a table, MySQL will automatically drop all triggers associated with 
the table.



*/

DROP TRIGGER update_items_trigger;

USE classicmodels;

DROP TABLE IF EXISTS billings;

CREATE TABLE billings(
    billingNo INT AUTO_INCREMENT,
    customerNo INT,
    billingDate DATE,
    amount DEC(10,2) ,
    PRIMARY KEY(billingNo)
);

DELIMITER //
CREATE TRIGGER before_billing_update
BEFORE UPDATE
ON billings
FOR EACH ROW
BEGIN 
    IF (new.amount > (old.amount * 10)) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'New amount cannot be greater than 10 times';
    END IF;
END ;
//
DELIMITER ;

SHOW triggers;

DROP TRIGGER before_billing_update;
