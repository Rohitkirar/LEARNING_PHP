/*
    INSERT IGNORE INTO table_name
    INSERT IGNORE statement allows you to disregard rows containing invalid data that would 
    otherwise trigger an error and insert only rows that contain valid data.

    Note that the IGNORE option is an extension of MySQL to the SQL standard.

    The IGNORE option is ignored when you use ON DUPLICATE KEY UPDATE.
*/

USE classicmodels;

SHOW TABLES;

DROP TABLE IF EXISTS subscribers;

CREATE TABLE IF NOT EXISTS subscribers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(130) NOT NULL UNIQUE
);

INSERT INTO subscribers
    (email)
VALUES 
    ('john.doe@gmail.com');

-- The UNIQUE constraint ensures that no duplicate email exists in the email column.

INSERT INTO subscribers
    (email)
VALUES 
    ('jane.smith@ibm.com'),
    ('john.doe@gmail.com'); --Duplicate entry 'john.doe@gmail.com' for key 'email'

INSERT IGNORE INTO subscribers
    (email)
VALUES  
    ('jane.smith@ibm.com'),
    ('john.doe@gmail.com');


INSERT IGNORE INTO subscribers
    (email)
VALUES  
    ('jane.smith@ibm.com'),
    ('roman.reign@gmail.com'),
    ('john.doe@gmail.com');

SHOW WARNINGS;

ALTER TABLE subscribers
ADD COLUMN comment VARCHAR(10),
ADD COLUMN subscribe_at DATETIME;

INSERT IGNORE INTO subscribers
    (email , comment , subscribe_at)
VALUES  
    ('jane.smith@ibm.com' , 'KEEPITUP' , CURRENT_DATE),
    ('roman.reign@gmail.com' , "GOOD TO SEE" , NULL),
    ('john.doe@gmail.com', NULL , CURRENT_DATE),
    ('brock.lesnar@gmail.com' , 'BEAST' , CURRENT_DATE),
    ('rock@gmail.com' , 'PEOPLES CHAMP ROCK' , CURRENT_DATE);

SELECT * FROM subscribers;
