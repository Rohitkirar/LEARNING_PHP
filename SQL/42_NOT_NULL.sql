/*
    MySQL NOT NULL Constraint
    
    * A NOT NULL constraint ensures that values stored in a column are not NULL
    
    * A column may have only one NOT NULL constraint, which enforces the rule that the column must not contain any NULL values.
    
    * If you attempt to update or insert a NULL value into a NOT NULL column, MySQL will issue an error.

    * It’s a good practice to have the NOT NULL constraint in every column of a table unless you have a specific reason not to.


*/
USE classicmodels;

-- adding NOT NULL Constraint


CREATE TABLE tasks2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE
);

DESC tasks2;

-- adding data to the table tasks2

INSERT INTO tasks2(title , start_date , end_date)
VALUES ('Learn MySQL NOT NULL constraint' , '2017-02-01' , '2017-02-02'),
        ('check and update Not null constraint' , '2017-02-10', NULL );
	
INSERT INTO tasks2(title)
VALUES('checking' );

SELECT * FROM tasks2;

-- -- Adding a NOT NULL constraint to an existing column

-- First, check the current values of the column if there are any NULL values.
-- Second, update the NULL to non-NULL.
-- Third, modify the column with a NOT NULL constraint.

SELECT * FROM tasks2 WHERE end_date IS NULL;


UPDATE tasks2 
SET end_date = start_date + 7
WHERE end_date IS NULL;

-- disable sql safe update
SET sql_safe_updates = 0;

-- adding a NOT NULL constraint

-- 1st first

ALTER TABLE tasks2
MODIFY end_date DATE NOT NULL;

-- 2nd second

ALTER TABLE tasks2
CHANGE end_date 
        end_date DATE NOT NULL	;

-- REMOVING A NOT NULL constraint

-- 1st first

ALTER TABLE tasks2
MODIFY end_date DATE;

-- 2nd second

ALTER TABLE tasks2
CHANGE end_date 
        end_date DATE	;


/*
Summary
Use NOT NULL constraint to ensure that a column does not contain any NULL values.
Use ALTER TABLE ... CHANGE statement to add a NOT NULL constraint to an existing column.
Use ALTER TABLE ... MODIFY to drop a NOT NULL constraint from a column.

*/