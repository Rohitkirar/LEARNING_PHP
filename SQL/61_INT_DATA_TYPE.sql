/*
An integer can be zero, positive, and negative.
An integer can be written without a fractional component such as 1, 100, 4, -10, 
and it cannot be 1.2, 5/3, Etc 

MySQL supports all standard SQL integer types INTEGER or INT and SMALLINT. 
Additionally, MySQL provides TINYINT ,  MEDIUMINT and BIGINT as extensions to the SQL standard.

Type	    (Bytes)

TINYINT	    1	
SMALLINT	2	            formula to calculate range
MEDIUMINT	3                   n = byte * 8
INT	        4	                range = - 2^n-1  to (2^n+1) - 1
BIGINT	    8	

Because integer type represents exact numbers, you usually use it as the primary key of a table. 
In addition, the INT column can have an AUTO_INCREMENT attribute.
*/
USE classicmodels;

SHOW TABLES;

DROP TABLE IF EXISTS items;

CREATE TABLE IF NOT EXISTS items(
    id INT auto_increment primary key,
    text varchar(255)
);

INSERT INTO items  
    (text)
VALUES 
    ('laptop'),
    ('mouse'),
    ('headphone');

SELECT * FROM items;

INSERT INTO items
    (id , text)
VALUES 
    (10 , 'Server');

-- Since the current value of the item_id column is 10, the sequence is reset to 11. If you insert a new row, the AUTO_INCREMENT column will use 11 as the next value

INSERT INTO items 
    (text)
VALUES
    ('Router');


INSERT INTO items 
    (id ,text)
VALUES
    (-10 , 'telephone');

INSERT INTO items 
    (text)
VALUES
    ( 'telephone');

SELECT * FROM items;

-- using unsigned to insert only positive value in column

DROP TABLE IF EXISTS classes;

CREATE TABLE classes(
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    total_member INT UNSIGNED,
    PRIMARY KEY (id)
);

INSERT INTO classes 
    (name , total_member)
VALUES
    ('FLY' , 232),
    ('Weekend' , 100);

SELECT * FROM classes;

INSERT INTO classes
    (name , total_member)
VALUES  
    ('SWIM' , -10);   -- error it store 0 in place of -ve  value






