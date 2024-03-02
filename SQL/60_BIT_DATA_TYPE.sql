/*
The BIT data type that allows you to store bit values, which are 0 and 1.

SYNTAX : column_name BIT(n);

    BIT(n) can store up to n-bit values. The n can range from 1 to 64. 
    The default value of n is 1 if you skip it.

*/

use classicmodels;

DROP TABLE IF EXISTS working_calendars;

CREATE TABLE working_calendars(
    year INT ,
    week INT ,
    days BIT(7),
    PRIMARY KEY (year , week)
);

-- The values in the column days indicate whether the day is a working day or day off i.e., 1: working day and 0: day off.

-- Suppose that Saturday and Friday of the first week of 2017 are not working days, you can insert a row into the working_calendars table:


INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 1 , B'1111100');



SELECT 
    year , week , bin(days) 
FROM 
    working_calendars;

SELECT * FROM working_calendars;

-- Suppose the first day of the second week is off, you can insert 01111100 into the  days column. However, the 111100 value will also work because MySQL will pad one zero to the left.

INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 2 , 1000);

INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 4 , 8232138);

-- Use MySQL BIT data type to store BIT data in a table.

INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 5 , -34);  -- 127

INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 6 , -1); -- 127

INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 7 , 0); -- false

INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 8 , 1); -- true

INSERT INTO working_calendars
    (year , week , days)
VALUES 
    (2017 , 9 , true); -- true


SELECT * FROM working_calendars;

