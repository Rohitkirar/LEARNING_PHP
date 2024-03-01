/*
    We can use JOIN clause in the UPDATE statement to update rows in one table
    based on values of another table.
    The UPDATE JOIN is useful when you need to modify data across related tables

    UPDATE T1
    [INNER JOIN | LEFT JOIN] T2 ON T1.C1 = T2.C1
    SET T1.C2 = T2.C2, 
        T2.C3 = expr
    WHERE condition;

    WE CAN use ONLY INNER JOIN AND LEFT JOIN TO UPDATE DATA


*/

use hr ;

SHOW TABLES;

DROP TABLE IF EXISTS employees;

DROP TABLE IF EXISTS merits;

CREATE TABLE merits(
    performance INT PRIMARY KEY,
    percentage DEC(10,2) NOT NULL
);

CREATE TABLE employees (
    id INT auto_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    performance INT DEFAULT NULL,
    salary DEC(10,2) DEFAULT NULL,
    CONSTRAINT fk_emp
    FOREIGN KEY (performance)
    REFERENCES merits(performance) 
);

INSERT INTO merits
    (performance , percentage)
VALUES
    (1, 0),
    (2, 0.01),
    (3, 0.03),
    (4, 0.05),
    (5, 0.8);

INSERT INTO employees
    (name , performance , salary)
VALUES
    ('Mary Doe' , 1 , 50000),
    ('Cindy Smith' , 3 , 65000),
    ('Sue Greenspan' , 4 , 75000),
    ('Grace Dell' , 5 , 125000),
    ('Nancy Johnson' , 3 , 85000),
    ('John Doe' , 2 , 45000),
    ('Lily Bush' , 3 , 55000);

-- Suppose you want to increment each employee’s salary by a percentage based on their performance.

UPDATE 
    employees 
JOIN
    merits 
USING
    (performance)
SET salary = salary + (salary*percentage);

SELECT * FROM employees;

-- thinks company hires new intern

INSERT INTO employees 
    (name , salary)
VALUES
    ('Roman Reign' , 18000),
    ('CM PUNK' , 12000);

SELECT * FROM employees;

-- employee salary hike based on their performance and 
-- for new intern hike 1% in their salay

-- To raise the salary for all employees including new hires, 
-- you cannot use the UPDATE INNER JOIN statement because the performance scores of the new hires are not available in the merits table. 
-- This is where the UPDATE LEFT JOIN statement comes to the rescue.

UPDATE 
    employees 
LEFT JOIN
    merits
USING
    (performance)
SET salary = salary + (salary * COALESCE(percentage , 0.01));
