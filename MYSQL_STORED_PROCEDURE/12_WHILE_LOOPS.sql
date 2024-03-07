-- Active: 1709188058198@@127.0.0.1@3306@classicmodels
/*
WHILE LOOP

WHILE search_condition DO
    statement_list
END WHILE ;

also use LEAVE and ITERATE in while loop

Use MySQL WHILE loop to execute one or more statements repeatedly as long as a condition is true.

*/

DROP TABLE IF EXISTS calenders;

CREATE TABLE calenders(
    date DATE PRIMARY KEY,
    month INT NOT NULL,
    quarter INT NOT NULL ,
    Year INT NOT NULL
);

DROP PROCEDURE `loadDates`;

CREATE PROCEDURE loadDates(
    IN startdate DATE ,
    IN enddate DATE
)
BEGIN
    DECLARE currentdate DATE DEFAULT startdate;

    WHILE currentdate < enddate DO
        
        INSERT INTO calenders(date , month , quarter , year)
        values (currentdate , MONTH(currentdate) , QUARTER(currentdate) , YEAR(currentdate));

        SET currentdate = DATE_ADD(currentdate , INTERVAL 5 DAY);

    END WHILE;
END;

call `loadDates`('2024-01-05' , '2024-04-05');

SELECT * FROM calenders;


DROP PROCEDURE `loadDates`;

CREATE PROCEDURE loadDates(
    IN startdate DATE ,
    IN enddate DATE
)
BEGIN
    DECLARE currentdate DATE DEFAULT startdate;

    insertdate : WHILE currentdate < enddate DO

        if(DAY(currentdate) = 15) THEN
            LEAVE insertdate;
        END IF;
        
        INSERT INTO calenders(date , month , quarter , year)
        values (currentdate , MONTH(currentdate) , QUARTER(currentdate) , YEAR(currentdate));

        SET currentdate = DATE_ADD(currentdate , INTERVAL 5 DAY);

        if(DAY(currentdate) = 05) THEN
            ITERATE insertdate;
        END IF;

    END WHILE;
END;

call `loadDates`('2024-04-05' , '2024-08-05');

SELECT * FROM calenders;