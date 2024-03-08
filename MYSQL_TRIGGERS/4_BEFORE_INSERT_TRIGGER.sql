/*
-> MYSQL BEFORE INSERT TRIGGER : 
* before insert trigger automatically fired before an insert event occurs on the table.
* SYNTAX
    CREATE TRIGGER trigger_name
    BEFORE INSERT ON TABLE_NAME
    FOR EACH ROW
    BEGIN 
        TRIGGER_BODY
    END;

NOTE : Note that in a BEFORE INSERT trigger, you can access and change the NEW values. 
    However, you cannot access the OLD values because OLD values obviously do not exist.
*/

USE classicmodels;

DROP TABLE IF EXISTS WorkCenters;

CREATE TABLE WorkCenters(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL
);

DROP TABLE IF EXISTS WorkCenterStats;

CREATE TABLE WorkCenterStats(
    totalCapacity INT NOT NULL
);

DELIMITER //

CREATE TRIGGER before_workcenters_insert
BEFORE insert On workcenters FOR EACH ROW
BEGIN
    DECLARE rowcount INT;

    SELECT COUNT(*) INTO rowcount FROM Workcenterstats;

    IF (rowcount>0) THEN
        UPDATE WorkCenterStats
        SET totalcapacity = totalcapacity + new.capacity;
    ELSE 
        INSERT INTO workCenterStats(totalcapacity)
        VALUES(new.capacity);
    END IF;
END; //
DELIMITER;

INSERT INTO WORKCENTERS (name , capacity)
VALUES('MOLD MACHINGE' , 100);

INSERT INTO WORKCENTERS (name , capacity)
VALUES('IRON ROD MACHINGE' , 100);

SELECT * FROM workcenters;

SELECT * FROM workCenterStats;

-- Note that to properly maintain the summary table WorkCenterStats, you should 
-- also create triggers to handle update and delete events on the WorkCenters table.



