/*
TIMESTAMP is a temporal data type that holds the combination of date and time. 
The format of a TIMESTAMP is YYYY-MM-DD HH:MM:SS which is fixed at 19 characters.

The TIMESTAMP value has a 
range from '1970-01-01 00:00:01' UTC to '2038-01-19 03:14:07' UTC.

When you insert a TIMESTAMP value into a table,
MySQL converts it from your connection’s time zone to UTC for storing.

When you query a TIMESTAMP value, 
MySQL converts the UTC value back to your connection’s time zone.
*/


Use classicmodels;

DROP TABLE IF EXISTS t;

CREATE TABLE IF NOT EXISTS t (
    ts TIMESTAMP
)

SET time_zone  = '+00:00';

INSERT INTO t
    (ts)
VALUES
    ('2008-01-01 00:00:01');

SELECT * FROM t;

SET TIME_ZONE = '+05:30';

SELECT * FROM t;

-- Automatic initialization and updating for TIMESTAMP columns

ALTER TABLE t
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

INSERT INTO t 
    (ts)
VALUES 
    ('2005-01-21 12:30:22');

--So a TIMESTAMP column can be automatically initialized to the current timestamp for inserted rows that specify no value for the column. This feature is called automatic initialization.

ALTER TABLE t 
ADD COLUMN 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP;

UPDATE t 
SET ts = '2008-02-02 01:01:16'
WHERE ts = '2008-01-01 05:30:01' ;


SELECT * FROM t;

-- Use the MySQL TIMESTAMP data type to represent date and time values.
-- Set the DEFAULT CURRENT_TIMESTAMP attribute for a TIMESTAMP column to automatically initialize the column with the current timestamp when a new row is inserted.
-- Set the ON UPDATE CURRENT_TIMESTAMP attribute to update the timestamp whenever the row is modified.
-- MySQL stores the TIMESTAMP values in UTC format but converts them to the current session timezone when displayed.

