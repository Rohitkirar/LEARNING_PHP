/*
* A trigger is a set of SQL statements, that is executed automatically in response to a 
    specified event including INSERT, UPDATE, or DELETE on a particular table.

syntax of the CREATE TRIGGER statement:

    CREATE TRIGGER trigger_name
    {BEFORE | AFTER} {INSERT | UPDATE | DELETE}
    ON table_name
    FOR EACH ROW
    BEGIN
        -- Trigger body (SQL statements)
    END;

To distinguish between the value of the columns BEFORE and AFTER the event has fired, 
you use the NEW and OLD modifiers.


The following table illustrates the availability of the OLD and NEW modifiers:

Trigger Event	OLD	        NEW

INSERT	        No          Yes
UPDATE	        Yes     	Yes
DELETE	        Yes     	No

*/
USE classicmodels;
show tables;

DROP TABLE IF EXISTS new_items;

CREATE TABLE new_items(
    id INT PRIMARY KEY,
    name varchar(50) NOT NULL,
    price Decimal (10,2) NOT NULL
);

INSERT INTO new_items(id , name , price)
values(1 , 'Item' , 50.00);

SELECT * FROM new_items;

-- create the item_changes table to store the changes made to the data in the items table:

CREATE TABLE item_changes(
    change_id INT PRIMARY KEY AUTO_INCREMENT,
    item_id INT ,
    change_type Varchar(10),
    change_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(item_id) REFERENCES new_items(id)
);

-- create a trigger called update_items_trigger associated with the items table

DELIMITER //
CREATE TRIGGER update_items_trigger
AFTER UPDATE
ON new_items
FOR EACH ROW 
BEGIN
    INSERT INTO item_changes(item_id , change_type)
    values (NEW.id , 'Update');
END;
//

DELIMITER ;

UPDATE new_items SET price = 60.00 WHERE id = 1;

SELECT * FROM item_changes;

-- Use the MySQL CREATE TRIGGER statement to create a new trigger in the database
