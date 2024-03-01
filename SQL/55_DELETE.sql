/*
    The DELETE statement allows you to delete rows from a table and returns the number of deleted rows.
    SYNTAX: 

    DELETE FROM table_name
    WHERE condition;

    Note that to delete data from multiple related tables, you use the DELETE JOIN statement

    To delete the first three rows, you can use the DELETE statement with the ORDER BY and LIMIT clauses:

    DELETE FROM table_table
    ORDER BY sort_expression
    LIMIT row_count;
*/

USE classicmodels;

SHOW TABLES;

SELECT * FROM contacts;

INSERT INTO contacts (first_name, last_name, email)
VALUES
    ('John', 'Doe', 'john.doe@email.com'),
    ('Jane', 'Smith', 'jane.smith@email.com'),
    ('Alice', 'Doe', 'alice.doe@email.com'),
    ('Bob', 'Johnson', 'bob.johnson@email.com'),
    ('Eva', 'Doe', 'eva.doe@email.com'),
    ('Michael', 'Smith', 'michael.smith@email.com'),
    ('Sophia', 'Johnson', 'sophia.johnson@email.com'),
    ('Matthew', 'Doe', 'matthew.doe@email.com'),
    ('Olivia', 'Smith', 'olivia.smith@email.com'),
    ('Daniel', 'Johnson', 'daniel.johnson@email.com'),
    ('Emma', 'Doe', 'emma.doe@email.com'),
    ('William', 'Smith', 'william.smith@email.com'),
    ('Ava', 'Johnson', 'ava.johnson@email.com'),
    ('Liam', 'Doe', 'liam.doe@email.com'),
    ('Mia', 'Smith', 'mia.smith@email.com'),
    ('James', 'Johnson', 'james.johnson@email.com'),
    ('Grace', 'Doe', 'grace.doe@email.com'),
    ('Benjamin', 'Smith', 'benjamin.smith@email.com'),
    ('Chloe', 'Johnson', 'chloe.johnson@email.com'),
    ('Logan', 'Doe', 'logan.doe@email.com');


-- delete data where id = 23

DELETE FROM contacts
WHERE id = 23;

SELECT * FROM contacts
WHERE last_name = 'Smith';

-- delete row whose lastname = SQL_TSI_MONTH

DELETE FROM contacts
WHERE last_name = 'smith';

-- Using DELETE statement with LIMIT clause;

SELECT * 
FROM contacts 
ORDER BY first_name; 

-- delete first 5 ROW

DELETE FROM contacts 
ORDER BY first_name
LIMIT 5;


SELECT * FROM contacts;

-- TO DELETE ALL ROWS FROM table 

DELETE FROM contacts;

-- use TRUNCATE TABLE instead of this to delete all rows data from table;

/*
    Summary
    Use the DELETE statement to delete one or more rows from a table.
    Use the DELETE statement without a WHERE clause to delete all rows from a table.
    Use the DELETE statement with a LIMIT clause to delete several rows from a table.
*/

