/*
Starting from MySQL 8.0, the key values are stored in descending order if you use the DESC
keyword in the index definition. The query optimizer can take advantage of the descending
index when descending order is requested in the query.

Use the MySQL descending index to improve query performance.

*/

USE classicmodels;
DROP TABLE IF EXISTS t;

CREATE TABLE t(
    a INT ,
    b INT ,
    INDEX a_asc_b_asc (a ASC , b ASC),
    INDEX a_asc_b_desc (a ASC , b DESC),
    INDEX a_desc_b_asc (a DESC , b ASC),
    INDEX a_desc_b_desc (a DESC , b ASC)
);

EXPLAIN SELECT * FROM t ORDER BY a, b; -- use index a_asc_b_asc

EXPLAIN SELECT * FROM t ORDER BY a , b DESC; -- use index a_asc_b_desc

EXPLAIN SELECT * FROM t ORDER BY a DESC , b ; -- use index a_desc_b_asc

EXPLAIN SELECT * FROM t ORDER BY a DESC, b DESC; -- use index a_DESC_b_desc



SELECT * FROM t;

CALL insertSampleData(10000 , 1 , 1000);

DELIMITER $$

CREATE PROCEDURE insertSampleData(
    IN rowCount INT, 
    IN low INT, 
    IN high INT
)
BEGIN
    DECLARE counter INT DEFAULT 0;
    REPEAT
        SET counter := counter + 1;
        -- insert data
        INSERT INTO t(a,b)
        VALUES(
            ROUND((RAND() * (high-low))+high),
            ROUND((RAND() * (high-low))+high)
        );
    UNTIL counter >= rowCount
    END REPEAT;
END$$    

DELIMITER ;

-- cardianality show the unique value in index
-- If a column has high cardinality, it’s likely to be a good candidate for indexing.

SHOW INDEXES FROM customers;

