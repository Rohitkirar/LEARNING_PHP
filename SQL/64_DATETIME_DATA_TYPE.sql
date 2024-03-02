/*
    MySQL DATETIME data type allows you to store a value that contains both date and time.

    query data from a DATETIME column, MySQL displays the DATETIME value in the following format:
        'YYYY-MM-DD HH:MM:SS'
    
    insert a value into a DATETIME column, you use the same format. For example:

    INSERT INTO table_name(datetime_column)
    VALUES('2023-12-31 15:30:45');

    To populate a column with the current date and time, 
    you use the result of the CURRENT_TIMESTAMP or NOW() function 
    as the default value.

    DATETIME values range from 1000-01-01 00:00:00 to 9999-12-31 23:59:59. 

    DATETIME value can include a trailing fractional second up to microseconds with the 
    format YYYY-MM-DD HH:MM:SS[.fraction] e.g., 2015-12-20 10:01:00.999999.

    MySQL provides another temporal data type that is similar to 
    the DATETIME called  TIMESTAMP.

    The TIMESTAMP requires 4 bytes while DATETIME requires 5 bytes. 
    Both TIMESTAMP and DATETIME require additional bytes for fractional seconds precision.

    TIMESTAMP in UTC value. 
    However, MySQL stores the DATETIME value as is without timezone


*/

USE CLASSICMODELS;

DROP TABLE IF EXISTS Timestamp_Datetime;
;
CREATE TABLE IF NOT EXISTS Timestamp_Datetime(
    id INT AUTO_INCREMENT PRIMARY KEY,
    TS TIMESTAMP,
    DT DATETIME
);


INSERT INTO timestamp_datetime
    (TS , DT)
VALUES
    (NOW() , NOW());

    

SELECT * FROM timestamp_datetime; -- both values are Same

-- Finally, set the connection’s time zone to +03:00 
-- and query data from the timestamp_n_datetime table again.

SET time_zone = '+03:00';

SELECT * FROM timestamp_datetime;

-- he output indicates that the value in the TIMESTAMP column is different. This is because the TIMESTAMP column stores the date and time value in UTC when we change the time zone, the value of the 
-- TIMESTAMP column is adjusted according to the new time zone.

-- It means that if you use the TIMESTAMP data to store date and time values, you should take serious consideration when you move your database to a server located in a different time zone.

-- The following statement sets the variable @dt to the current date and time using the NOW() function.


SET time_zone = '+05:30';

SET @dt = NOW();

SELECT @dt;

SELECT DATE(@dt);

SELECT TIME(@dt);

-- other example

CREATE TABLE test_dt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    created_at DATETIME
);

INSERT INTO test_dt
    (created_at)
VALUES
    ('2015-11-05 14:29:36');


SELECT * FROM test_dt;

SELECT 
    *
FROM
    test_dt
WHERE
    created_at = '2015-11-05'; -- no row return as we have to pass time RELEASE_ALL_LOCKS


SELECT 
    *
FROM
    test_dt
WHERE
    DATE(created_at) = '2015-11-05';


-- we have different function to fetch different property from timestamp_datetime

SELECT
    HOUR(@dt),
    MINUTE(@dt),
    SECOND(@DT),
    DAY(@dt),
    WEEK(@dt),
    MONTH(@dt),
    QUARTER(@dt),
    YEAR(@dt);


-- DATE_FORMAT() function

-- To format a DATETIME value, you use the DATE_FORMAT function. 
-- For example, the following statement formats a DATETIME value based on the %H:%i:%s - %W %M %Y format:

SELECT DATE_FORMAT(@dt , '%H:%i:%s - %W %M %Y');


-- MySQL DATE_ADD function

SELECT @dt as start,
    DATE_ADD(@dt , INTERVAL 1 SECOND) as '1 second later' ,
    DATE_ADD(@Dt , INTERVAL 1 minute) AS '1 minute later',
    DATE_ADD(@Dt , INTERVAL 1 hour) AS '1 hour later',
    DATE_ADD(@Dt , INTERVAL 1 day) AS '1 day later',
    DATE_ADD(@Dt , INTERVAL 1 week) AS '1 week later',
    DATE_ADD(@Dt , INTERVAL 1 month) AS '1 month later',
    DATE_ADD(@Dt , INTERVAL 1 year) AS '1 year later';

SELECT @dt start, 
       DATE_SUB(@dt, INTERVAL 1 SECOND) '1 second before',
       DATE_SUB(@dt, INTERVAL 1 MINUTE) '1 minute before',
       DATE_SUB(@dt, INTERVAL 1 HOUR) '1 hour before',
       DATE_SUB(@dt, INTERVAL 1 DAY) '1 day before',
       DATE_SUB(@dt, INTERVAL 1 WEEK) '1 week before',
       DATE_SUB(@dt, INTERVAL 1 MONTH) '1 month before',
       DATE_SUB(@dt, INTERVAL 1 YEAR) '1 year before';


-- MySQL DATE_DIFF function

SELECT DATEDIFF(NOW() , '2002-02-15')/365;

-- In this tutorial, you have learned about MySQL DATETIME data type and some useful DATETIME functions.
