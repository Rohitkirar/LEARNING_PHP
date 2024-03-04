/*
    MySQL TRUNCATE TABLE statement

        TRUNCATE [TABLE] table_name;
    
    there is any FOREIGN KEY constraints from other tables that reference the table 
    that you truncate, the TRUNCATE TABLE statement will fail.

    Since a truncate operation causes an implicit commit, 
    it cannot be rolled back. 

    The TRUNCATE TABLE statement resets the value in the AUTO_INCREMENT column to 
    its initial value if the table has an AUTO_INCREMENT column.

    the TRUNCATE TABLE statement is like a DELETE statement without a WHERE clause that deletes all rows from a table:
        DELETE FROM table_name;

    OR a sequence of DROP TABLE and CREATE TABLE statements:

    DROP TABLE table_name;

    CREATE TABLE table_name (
        //table definition
    );

    the TRUNCATE TABLE statement is more efficient than the DELETE statement 
    because it drops and recreates the table instead of deleting rows 
    one by one.
*/
USE classicmodels;

DROP TABLE IF EXISTS books;

CREATE TABLE books(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
) ENGINE = INNODB;

DELIMITER $$
CREATE PROCEDURE load_book_data(IN num INT(4))
BEGIN
    DECLARE counter INT(4) DEFAULT 0;
    DECLARE book_title VARCHAR(255) DEFAULT '' ;

    WHILE counter < num DO
        SET book_title = CONCAT('Book title #' , counter);
        SET counter = counter + 1 ;

        INSERT INTO books
            (title)
        VALUES
            (book_title);
    END WHILE;
END$$
DELIMITER;

CALL load_book_data(10000);

SELECT * FROM books;

TRUNCATE TABLE books;

-- Note that you can compare the performance of the TRUNCATE TABLE with the DELETE statement.
-- Use the TRUNCATE TABLE statement to delete all rows from a table efficiently.
-- The TRUNCATE TABLE statement resets the AUTO_INCREMENT counter.
