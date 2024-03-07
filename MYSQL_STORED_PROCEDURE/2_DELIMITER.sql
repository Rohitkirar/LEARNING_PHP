-- Active: 1709188058198@@127.0.0.1@3306@classicmodels
/*
* DELIMITER : A MySQL client program, such as MySQL Workbench or the mysql program, 
             uses the default delimiter (;) to separate statements and execute each separately.

* To redefine the default delimiter, you use the DELIMITER command as follows:
    DELIMITER delimiter_character
* The delimiter_character may consist of a single character or multiple characters, such as // or $$. 
However, you should avoid using the backslash (\) because it’s the escape character in MySQL.

*/

DELIMITER //

SELECT * FROM customers // SELECT * FROM employees //

DELIMITER $
SELECT * FROM customers $ SELECT * FROM orders $

DELIMITER / 

SELECT * FROM payments / SELECT * FROM orderdetails

DELIMITER //
CREATE PROCEDURE IF NOT EXISTS CreatePersonTable()
BEGIN
    DROP TABLE IF EXISTS Persons;

    CREATE TABLE persons(
        id INT AUTO_INCREMENT primary key,
        firstName VARCHAR(40) NOT NULL,
        lastName Varchar(55) NOT NULL
    );

    INSERT INTO PERSONs(firstName , lastName)
    VALUES('john' , 'doe' ),
        ('Jane' , 'Doe');

    SELECT id, firstName , lastName
    FROM persons;
END ;



DELIMITER ;

CALL CreatePersonTable();

SELECT * FROM persons;
