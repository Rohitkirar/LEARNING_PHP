/*
MYSQL AFTER INSERT TRIGGER

MySQL AFTER INSERT triggers are automatically invoked after an insert event occurs 
on the table.

SYNTAX : 
    CREATE TRIGGER trigger_name
    AFTER INSERT
    ON table_name FOR EACH ROW
    BEGIN  //trigger_body  END;

In an AFTER INSERT trigger, you can access the NEW values but you cannot change them. 
Also, you cannot access the OLD values because there is no OLD on INSERT triggers.
*/

USE classicmodels;

DROP TABLE IF EXISTS members;

CREATE TABLE members(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name Varchar(100) NOT NULL,
    email VARCHAR(200) ,
    dob date
);

DROP TABLE IF EXISTS reminders;

CREATE TABLE reminders(
    id INT AUTO_INCREMENT,
    memberId INT,
    message VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

DROP TRIGGER IF EXISTS after_members_insert;

DELIMITER //

CREATE TRIGGER after_members_insert
AFTER INSERT
ON members FOR EACH ROW
BEGIN 
    IF (NEW.dob IS NULL) THEN
        INSERT INTO REMINDERS(memberId , message)
        VALUES(new.id , CONCAT('hii ' ,NEW.name , ', PLEASE update your dob!' ));
    END IF;
END ; //
DELIMITER ;

INSERT INTO members(name , email , dob)
VALUES('john doe' , 'john.doe@gmail.com' , NULL),
        ('jane doe' , 'jane.doe@ezample.com' , '2002-12-12');

INSERT INTO members(name , email )
VALUES('HARI BHAI' , 'HK.doe@gmail.com' ),
        ('JANAK BHAI' , 'JK.doe@ezample.com' );

SELECT * FROM members;
SELECT * FROM reminders;


