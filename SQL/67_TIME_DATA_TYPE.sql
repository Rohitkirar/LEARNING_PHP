/*
 TIME Data Type
MySQL uses the 'HH:MM:SS' format for querying and displaying a time value that represents a time of day, which is within 24 hours. 


To represent a time interval between two events, MySQL uses the 'HHH:MM:SS' format, which is larger than 24 hours.

*/

USE classicmodels;

DROP TABLE IF EXISTS tests;

CREATE TABLE IF NOT EXISTS tests(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    start_at Time,
    end_at TIME
);

INSERT INTO tests 
    (name , start_at , end_at)
VALUES
    ('test1' , '10:22:43' , '07:07:43');

INSERT INTO tests 
    (name , start_at , end_at)
VALUES
    ('test2' , '10:22:43' , '07:07:73'); -- invalid 00:00:00


SELECT * FROM tests;

INSERT INTO tests 
    (name , start_at , end_at)
VALUES
    ('test2' , '10:22:43' , '07:07:73'); -- invalid 00:00:00


SELECT * FROM tests;

-- MySQL allows you to use the 'HHMMSS' format without delimiter ( : ) to represent time value. For example, '08:30:00' and '10:15:00' can be rewritten as '083000' and '101500'

INSERT INTO tests
    (name , start_at , end_at)
VALUES
    ('test3' , '232321' , '082056');

INSERT INTO tests
    (name , start_at , end_at)
VALUES
    ('test4' , 232321 , 082056);

-- CURRENT_TIME()

SELECT CURRENT_TIME();

SELECT ADDTIME(CURRENT_TIME() , 020000);

SELECT SUBTIME(CURRENT_TIME() , 080058);

SELECT TIMEDIFF(CURRENT_TIME() , 080000);

SELECT TIME_FORMAT(CURRENT_TIME() , '%H|%i|%s');

SELECT TIME_FORMAT(CURRENT_TIME() , '%h:%i %p');

-- To get the UTC time, y

SELECT UTC_TIME();



