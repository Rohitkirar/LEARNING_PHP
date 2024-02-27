/*
 1. Due to evolving business requirements, you need to rename the existing table to better align with the new situation. 
    MySQL offers a valuable statement for renaming one or more tables.

 2. To rename one or more tables, you can use the RENAME TABLE statement as follows:

        RENAME TABLE table_name
        TO new_table_name;

 NOTE : The table with the table_name must exist or the RENAME statement will fail with an error.
        While executing the RENAME TABLE statement, you need to ensure that there are no active transactions or locked tables.

 Note that you cannot use the RENAME TABLE statement to rename a temporary table, 
        but you can use the ALTER TABLE statement to rename a temporary table.       

Renaming multiple tables

RENAME TABLE 
   table_name1 TO new_table_name1,
   table_name2 TO new_table_name2,
   ...;
*/


CREATE DATABASE IF NOT EXISTS hr;

USE hr;

CREATE TABLE IF NOT EXISTS departments(
        department_id INT AUTO_INCREMENT PRIMARY KEY,
        dept_name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS employees(
        id int AUTO_INCREMENT primary key,
        first_name VARCHAR(50) not null,
        last_name VARCHAR(50) not NULL,
        department_id INT NOT NULL,
        FOREIGN KEY (department_id)
                REFERENCES departments(department_id)
);

INSERT INTO departments(dept_name)
VALUES ('sales'),
        ('Marketing'),
        ('Finance'),
        ('Accounting'),
        ('Warehouses'),
        ('production');

INSERT INTO employees(first_name , last_name , department_id)
VALUES ('John' , 'Doe' , 1 ),
        ('Bush' , 'Lily' , 2),
        ('David' , 'DAVE' , 3),
        ('Mary' , 'Jane' , 4),
        ('Jonatha' , 'Josh' , 5),
        ('Mateo' , 'More' , 1);

SELECT * FROM departments;

SELECT * FROM employees;

SELECT id , first_name , last_name , dept_name
FROM employees
JOIN
departments
USING(department_id);

RENAME TABLE departments TO depts;

RENAME TABLE depts TO departments;

-- RENaming multiple table

RENAME TABLE 
	departments TO depts,
    employees TO people;
    
RENAME TABLE 
	depts TO departments,
    people TO employees;
    
-- Renaming table using ALter TABLE STATEMENT
-- The ALTER TABLE statement can rename a temporary table while the RENAME TABLE statement cannot.

ALTER TABLE departments RENAME TO depts;

ALTER TABLE employees RENAME TO peoples;

SELECT id , first_name , last_name , dept_name
FROM peoples
JOIN
depts USING(department_id);

DELETE FROM depts
WHERE department_id = 1;


CREATE TEMPORARY TABLE lastNames
SELECT DISTINCT last_name FROM peoples;

SELECT * FROM lastNames;







