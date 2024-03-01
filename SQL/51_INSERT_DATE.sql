/*
    The DATE data type allows you to store the date values
    SYNTAX : column_name DATE

    The valid range for the DATE values is '1000-01-01' to '9999-12-31'. 
    If you attempt to insert an invalid date value into a date column, the data inserted is 0000-00-000


*/

use classicmodels;

DROP TABLE IF EXISTS events;

CREATE TABLE IF NOT EXISTS events(
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL
);

INSERT INTO events 
    (event_name , event_date)
VALUES 
    ('A' , '2023-10-29');

-- If you attempt to insert an invalid date value into a DATE column, MySQL will issue an error. For example:

INSERT INTO events
    (event_name , event_date)
VALUES
    ('B' , '2024-02-30'); -- insert 0000-00-00

-- current_date() returns current date

INSERT INTO events
    (event_name , event_date)
VALUES
    ('C' , CURRENT_DATE());

-- to insert UTC_DATE() to INSERT

INSERT INTO events
    (event_name , event_date)
VALUES
    ('D' , UTC_DATE());

-- STR_TO_DATE('strdate' , 'format');

INSERT INTO events 
    (event_name , event_date)
VALUES
    ('E' , STR_TO_DATE('10/29/2022' , '%m/%d/%Y'));

SELECT * FROM events;

/*
    Summary
    
    Use the date value in the format 'YYYY-MM-DD' when inserting it into a date column.
    
    Use the CURRENT_DATE to insert the current date from the MySQL database server into a date column.
    
    Use the UTC_DATE() function to insert the current date in UTC into a date column.
    
    Use the STR_TO_DATE() function to convert a date string into a date before inserting it into a date column.

*/


