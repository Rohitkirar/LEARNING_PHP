/*
The REPEAT statement creates a loop that repeatedly executes a block of statements 
until a condition is true.

[begin_label:] REPEAT
    statement;
UNTIL condition
END REPEAT [end_label]

The REPEAT repeatedly executes the statements inside its block until the specified condition becomes true.

It’s important to note that the REPEAT checks the condition after the execution of the block, 
meaning that the block always executes at least once.

The REPEAT statement can have optional labels before the REPEAT keyword and after the END REPEAT keyword.

Use the MySQL REPEAT statement to execute one or more statements until a condition is true.
*/

DROP TABLE IF EXISTS calenders;

CREATE TABLE calenders(
    date DATE PRIMARY KEY,
    month INT NOT NULL,
    quarter INT NOT NULL,
    year INT NOT NULL
);

DROP PROCEDURE `loadDates`;

CREATE PROCEDURE loaddates(
    IN startdate DATE ,
    IN enddate DATE
)
BEGIN
    DECLARE currentdate DATE default startdate;

    REPEAT

    insert INTO calenders(date , month , quarter , year)
    values
        (currentdate , MONTH(currentdate) , QUARTER(currentdate) , YEAR(currentdate));
    
    SET currentdate = DATE_ADD(currentdate , INTERVAL 5 DAY);

    UNTIL (currentdate > enddate)
    END REPEAT;
END;


CALL `fillDates`('2024-01-01', '2024-06-01');

SELECT * FROM calenders;
show errors;