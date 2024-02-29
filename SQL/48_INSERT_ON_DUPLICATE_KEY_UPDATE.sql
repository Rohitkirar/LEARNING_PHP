

/*
    If a duplicate key violation occurs, you can use the INSERT ON DUPLICATE KEY UPDATE 
    statement to update existing rows instead of throwing an error.

    This INSERT ON DUPLICATE KEY UPDATE statement is useful when you deal with unique constraints or primary keys.

    Here’s the syntax of INSERT ON DUPLICATE KEY UPDATE statement:

        INSERT INTO table_name (column1, column2, ...)
        VALUES (value1, value2, ...)
        ON DUPLICATE KEY UPDATE
        column1 = new_value1, 
        column2 = new_value2, 
        ...;
    
    column1 = new_value1, column2=new_value2: Define how existing rows should be updated if a duplicate key is encountered.
    
    return : returns the number of affected rows

    MySQL allows you to define a row alias for the inserted row using the AS alias_name after the VALUES clause.

    Then, you can use the alias within the ON DUPLICATE KEY UPDATE clause to reference the inserted row’s values.

    Row aliases

    Here’s the syntax for defining a row alias:

        INSERT INTO table_name (column1, column2, ...)
        VALUES (value1, value2, ...)
        AS new_data -- Row alias
        ON DUPLICATE KEY UPDATE
        column1 = new_data.column1,
        column2 = new_data.column2 + 1;

*/
USE test;

SHOW TABLEs;

DROP TABLE employees;

CREATE TABLE  employees(
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    bonus DECIMAL(10,2) DEFAULT 0
);

INSERT INTO employees 
    (id , name , age , salary)
VALUES
    (1 , 'Jane Doe' , 25 , 120000),
    (2, 'John Cena' , 20 , 90000 );


SELECT * FROM employees;

INSERT INTO employees   -- Duplicate entry '1' for key 'PRIMARY'
    (id , name , age , salary) 
VALUES  
    (1 , 'Jane Smith' , 26 , 130000);


INSERT INTO employees
    (id , name , age , salary)
VALUES
    (1 , 'jane Doe' , 26 , 130000)
AS new 
ON DUPLICATE KEY UPDATE
    name = new.name,
    age = new.age,
    salary = new.salary;

