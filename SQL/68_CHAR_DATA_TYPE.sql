/*
The CHAR data type is a fixed-length character type in MySQL. 
You often declare the CHAR type with a length that specifies the maximum number 
of characters that you want to store. 
For example, CHAR(20) can hold up to 20 characters.

he length of the CHAR data type can be any value from 0 to 255. 
When you store a CHAR value, 
MySQL pads its value with spaces to the length that you declared.

Note that MySQL will not remove the trailing spaces if you enable the PAD_CHAR_TO_FULL_LENGTH SQL mode.

*/

USE classicmodels;

DROP TABLE IF EXISTS mysql_char_test;

CREATE TABLE IF NOT EXISTS mysql_char_test(
    status CHAR(3)
);

INSERT INTO mysql_char_test
    (status)
Values 
    ('YES') ,
    ('NO'); 

INSERT INTO mysql_char_test
    (status)
Values 
    ('TRUE') ,
    (' T ') ,
    ('FALSE'); 

SELECT status , LENGTH(status) FROM mysql_char_test;

SELECT * FROM mysql_char_test;

-- MySQL does not consider trailing spaces when comparing CHAR values using the comparison operator such as =, <>, >, <, etc.
--  LIKE operator does consider the trailing spaces when you do pattern matching with CHAR values.

SELECT * 
FROM mysql_char_test
WHERE status = ' T ';

-- If the CHAR column has a UNIQUE index and you insert a value that is different from an existing value in a number of trailing spaces, MySQL will reject the changes because of duplicate-key error.


-- MySQL CHAR data type is a fixed-length character type.
-- Use the CHAR data type to store fixed-length character data.


