/*
    MySQL Insert DateTime 
    The DATETIME data type is used to store both date and time values
    
    SYNTAX column_name DATETIME

    In practice, you use the DATETIME columns to store both date and time values 
    such as event times, logging times, and more.

    To insert data into the DATETIME columns,the datetime values are in the 'YYYY-MM-DD HH:MM:SS' format.


*/

USE classicmodels;

show Tables;

DROP TABLE IF EXISTS events;

CREATE TABLE IF NOT EXISTS events(
    id INT auto_increment PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_time DATETIME NOT NULL
);



INSERT INTO events(event_name , event_time)
VALUES ('MYSQL tutorial livestream' , '2023-10-12 19:30:46');


-- To insert the current date and time into a DATETIME column, you use the NOW() 

INSERT INTO events 
    (event_name , event_time)
VALUES  
    ('mysql workshop' , NOW());

-- insert string of date into datetime col use STR_TO_DATE()

INSERT INTO events
    (event_name , event_time)
VALUES  
    ('MYsql party' , STR_TO_DATE('10/28/2023 20:04:34', '%m/%d/%Y %H:%i:%s'));


INSERT INTO events
    (event_name , event_time)
VALUES
    ('A' , '2023-12-23 23:11:32');

INSERT INTO events
    (event_name , event_time)
VALUES
    ('B' , '2023-12-23');

INSERT INTO events
    (event_name , event_time)
VALUES
    ('B' , '2023/12/23');

INSERT INTO events
    (event_name , event_time)
VALUES
    ('B' , '23/05/2023');

INSERT INTO events
    (event_name , event_time)
VALUES
    ('B' , STR_TO_DATE('23/05/2023' , '%d/%m/%Y'));

SELECT * FROM events;



