/*
MYSQL AFTER DELETE TRIGGER

MySQL AFTER DELETE  triggers are automatically invoked after a delete event 
occurs on the table.

how to create a MySQL AFTER DELETE trigger to maintain a summary table of 
another table.

MySQL AFTER DELETE trigger SYNTAX:

    CREATE TRIGGER trigger_name
        AFTER DELETE
        ON table_name FOR EACH ROW
    trigger_body;

In an AFTER DELETE trigger, you can access the OLD row but cannot change it.

Note that there is no NEW row in the AFTER DELETE trigger.
*/


USE classicmodels;

DROP TABLE IF EXISTS Salaries;

CREATE TABLE Salaries(
    employeeNumber INT PRIMARY KEY,
    validFrom DATE NOT NULL,
    amount DEC(10,2) NOT NULL DEFAULT 0
);

INSERT INTO salaries(employeeNumber,validFrom,amount)
VALUES
    (1002,'2000-01-01',50000),
    (1056,'2000-01-01',60000),
    (1076,'2000-01-01',70000);

INSERT INTO salaries(employeeNumber,validFrom,amount)
VALUES
    (1012,'2000-01-01',150000),
    (1053,'2000-01-01',160000),
    (1087,'2000-01-01',170000);


DROP TABLE IF EXISTS totalSalaryBudget;

CREATE TABLE TotalSalaryBudget(
    Totalamount DEC(15,2) NOT NULL DEFAULT 0
);

INSERT INTO TotalSalaryBudget
SELECT SUM(amount) FROM salaries;

DROP TRIGGER IF EXISTS after_salaries_delete;

CREATE TRIGGER after_salaries_delete
AFTER DELETE
ON salaries
FOR EACH ROW 
Update TotalSalaryBudget
SET totalamount = totalamount - old.amount ;

DROP TRIGGER IF EXISTS after_salaries_insert;

CREATE TRIGGER after_salaries_insert
BEFORE INSERT
ON salaries
FOR EACH ROW 
Update TotalSalaryBudget
SET totalamount = totalamount + NEW.amount ;

SELECT * FROM totalSalaryBudget; -- 180000
SELECT * FROM totalSalaryBudget; -- 660000 after second insertion

SELECT * FROM salaries;

DELETE FROM salaries
WHERE employeeNumber = 1087;

SELECT * FROM totalSalaryBudget; -- 490000 after delete

-- AFTER DELETE trigger to maintain a summary table of another table.