/*
MYSQL BEFORE DELETE TRIGGERS

MySQL BEFORE DELETE triggers are fired automatically 
before a delete event occurs in a table.


SYNTAX : 

    CREATE TRIGGER trigger_name
    BEFORE DELETE
    ON table_name FOR EACH ROW
    trigger_body

In a BEFORE DELETE trigger, you can access the OLD row but cannot update it. 
Also, there is no NEW row in the BEFORE DELETE trigger.
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


DROP TABLE IF EXISTS SalariesArchive;

CREATE TABLE SalariesArchive(
    id INT PRIMARY KEY AUTO_INCREMENT,
    employeeNumber INT NOT NULL,
    validFrom DATE NOT NULL,
    amount DEC(10,2) NOT NULL DEFAULT 0,
    deleteAt TIMESTAMP DEFAULT NOW()
);

DROP TRIGGER IF EXISTS before_salaries_delete;

DELIMITER //
CREATE TRIGGER before_salaries_delete
BEFORE DELETE 
ON salaries 
FOR EACH ROW
BEGIN 
    INSERT INTO salariesArchive
        (employeeNumber , validFrom , amount , deleteAt)
    VALUES (old.employeeNumber , old.validFrom , old.amount , NOW());
END; //

DELIMITER ;

DELETE FROM salaries WHERE employeeNumber = 1076;


SELECT * FROM salariesArchive;

-- you have learned how to create a MySQL BEFORE DELETE trigger to add deleted rows
-- into an archive table.




