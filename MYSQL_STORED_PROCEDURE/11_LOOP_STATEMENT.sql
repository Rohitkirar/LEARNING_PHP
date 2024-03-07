
/*

-- LOOP STATEMENT 

[begin_label:] LOOP
    statements;
END LOOP [end_label]

-> The LOOP can have optional labels at the beginning and end of the block.

-> LEAVE is similar like BREAK keyword; USE to exit the loop

[label]: LOOP
    ...
    -- terminate the loop
    IF condition THEN
        LEAVE [label];
    END IF;
    ...
END LOOP;

-> ITERATE is similar like continue keyword ; USE TO escape current iteration

[label]: LOOP
    ...
    -- terminate the loop
    IF condition THEN
        ITERATE [label];
    END IF;
    ...
END LOOP;
*/
;
show tables;

DROP TABLE calenders;

DROP procedure fillDates;

CREATE TABLE calenders (
    date DATE PRIMARY KEY,
    month INT NOT NULL,
    quarter INT NOT NULL,
    year INT NOT NULL
);

CREATE PROCEDURE fillDates(
    IN startdate DATE,
    IN enddate DATE 
)
BEGIN 

    DECLARE currentdate DATE DEFAULT startdate;

    insert_date : LOOP

        SET currentdate = DATE_ADD(currentdate , INTERVAL 1 DAY);

        if(currentdate > enddate) THEN
            LEAVE insert_date;
        END IF;
        
        INSERT INTO calenders (date , month , quarter , year)
        VALUES (currentdate , MONTH(currentdate) , QUARTER(currentdate) , year(currentdate));
    
    END LOOP;
END ;

call fillDates('2024-01-01' , '2024-03-01');

SELECT * FROM calenders;

CREATE PROCEDURE fillEvenDates(
    IN startdate DATE,
    IN enddate DATE 
)
BEGIN 

    DECLARE currentdate DATE DEFAULT startdate;

    insert_date : LOOP

        SET currentdate = DATE_ADD(currentdate , INTERVAL 1 DAY);

        if(currentdate > enddate) THEN
            LEAVE insert_date;
        END IF;

        if(DAY(currentdate)%2 != 0) THEN
            ITERATE insert_date;
        END IF;
        
        INSERT INTO calenders (date , month , quarter , year)
        VALUES (currentdate , MONTH(currentdate) , QUARTER(currentdate) , year(currentdate));
    
    END LOOP;
END ;

call fillEvenDates('2024-03-01' , '2024-06-01');

SELECT * FROM calenders;

