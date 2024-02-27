/*
    To remove existing tables, you use the MySQL DROP TABLE statement
        DROP [TEMPORARY] TABLE [IF EXISTS] table_name [, table_name] ...
        [RESTRICT | CASCADE]

    -> DROP TABLE statement removes a table and its data permanently from the database. 
    -> In MySQL, remove multiple tables using a single DROP TABLE statement, table separated by a comma (,).
    -> TEMPORARY option allows to remove temporary tables only. It ensures that do not accidentally remove non-temporary tables.
    -> IF EXISTS option conditionally drop a table only if it exists
    -> 
*/
USE hr;

-- creating table first

CREATE TABLE insurances(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    effectiveDate DATE NOT NULL,
    duration INT NOT NULL,
    amount DEC(10,2) NOT NULL
);

DESC insurances;

-- droping a single table

DROP TABLE IF EXISTS insurances;

CREATE TABLE CarAccessories(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name Varchar(100) NOT NULL,
    price DEC(10,2) NOT NULL
);

CREATE TABLE CarGadgets(
	id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
);

DESC carGadgets; 
DESC carAccessories;
-- droping multiple table

DROP TABLE IF EXISTS CarAccessories , CarGadgets; -- give warning table not exist

SHOW WarNINGs; -- to show warnings

DROP TABLE carAccessories; -- ERROR : doesn't exist

-- Unfortunately, MySQL does not have the DROP TABLE LIKE statement that can remove tables based on pattern matching
-- TO DO SO 

CREATE TABLE IF NOT EXISTS test1 (
	id INT Auto_increment PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    ADDRESS VARCHAR(100) 
);

CREATE TABLE IF NOT EXISTS test2 LIKE test1;

CREATE TABLE IF NOT EXISTS test3 LIKE test1;


-- set table schema and pattern matching for table

SET @schema = 'hr';
SET @pattern = 'test%' ; 

-- build dynamic sql (DROP TABLE tabl1 , tabl2,tabl3..;
SELECT CONCAT('DROP TABLE ' , GROUP_CONCAT(CONCAT(@schema,'.',table_name)), ';') 
INTO @droplike
FROM information_schema.tables
WHERE @schema = database()
AND table_name LIKE @pattern;

-- display the dynamic sql statement
SELECT @droplike;

-- execute dynamic sql
PREPARE stmt FROM @droplike;

EXECUTE stmt;

DEALLOCATE PREPARE stmt;

-- table removed

DESC test1;
DESC test2;
DESC test3;



