/*
PROBLEM : 
you create a view to reveal the partial data of a table. 
However, a simple view is updatable, and therefore, it is possible
to update data that is not visible through the view

This update makes the view inconsistent.

To ensure the consistency of the view, you use the WITH CHECK OPTION
clause when you create or modify the view.

This WITH CHECK OPTION prevents you from updating or inserting rows 
that are not visible through the view.

SYNTAX

    CREATE OR REPLACE VIEW view_name 
    AS
    select_statement
    WITH CHECK OPTION;
*/;

CREATE DATABASE mydb;

USE mydb;

CREATE TABLE employees(
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    name VARCHAR(255) NOT NULL
);

SELECT * FROM employees;

CREATE VIEW contractor AS
SELECT * FROm employees WHERE type = 'contractor';


SELECT * FROm contractor;

INSERT INTO contractor (type , name)
VALUES('Contractor' , 'ANDY BLACK' );


--  problem is that you can add an employee with other type also
INSERT INTO contractors(name, type) 
VALUES('Deric Seetoh', 'Full-time');

-- To prevent this, you need to add the WITH CHECK OPTION

ALTER VIEW contractor AS
SELECT * FROm employees WHERE type = 'contractor' 
WITH CHECK OPTION;

INSERT INTO contractor (type , name)
VALUES('otherType' , 'ANDY BLACK' ); -- error on inserting other type


/*
To determine the scope of the check, MySQL provides two options: LOCAL and CASCADED.
If you don’t specify the keyword explicitly in the WITH CHECK OPTION clause, 
MySQL uses CASCADED by default.
*/

