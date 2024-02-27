/*
    When you create a new table, you specify the table columns in the CREATE TABLE statement. 
    Then, you use the INSERT, UPDATE, and DELETE statements to modify directly the data in the table columns.

    MySQL 5.7 introduced a new feature called the generated column. 
    Columns are generated because the data in these columns are computed based on predefined expressions.

    The syntax for defining a generated column is as follows:

        column_name data_type [GENERATED ALWAYS] AS (expression)
        [VIRTUAL | STORED] [UNIQUE [KEY]]
    
    Use a MySQL Generated column to store data computed from an expression or other columns.
    -> VIRTUAL
        A virtual generated column does not occupy any storage space within the table.
        It is computed only when it is read (retrieved from the table).Think of it as a dynamic calculation 

    -> STORED
        A stored generated column is computed when data is written (inserted or updated) into the table.
        It behaves like a regular column in terms of storage    


*/
USE classicmodels;

DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO contacts (first_name , last_name , email)
VALUES 
    ("ROHIT" , "KIRAR" , "rk123@gmail.com"),
    ("SOHAM" , "Bharti" , "sb123@gmail.com"),
    ("Hritik" , "Yemde" , "hy123@gmail.com"),
    ("AKASH" , "PAtel" , "Ap123@gmail.com"),
    ("Sagar" , "Jethva" , "sj123@gmail.com");

-- to get full we use concat here

SELECT id , CONCAT(first_name , ' ' , last_name) as FULLNAME
FROM contacts;

-- using generated columns


DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    full_name VARCHAR(50) GENERATED ALWAYS AS (CONCAT(first_name , ' ' , last_name)),
    email VARCHAR(100) NOT NULL
);

INSERT INTO contacts (first_name , last_name , email)
VALUES 
    ("ROHIT" , "KIRAR" , "rk123@gmail.com"),
    ("SOHAM" , "Bharti" , "sb123@gmail.com"),
    ("Hritik" , "Yemde" , "hy123@gmail.com"),
    ("AKASH" , "PAtel" , "Ap123@gmail.com"),
    ("Sagar" , "Jethva" , "sj123@gmail.com");

SELECT id , full_name FROM contacts;

SELECT * FROM contacts;

--  data from quantityInStock and buyPrice columns allow us to calculate the stock’s value per SKU

ALTER TABLE products 
ADD Column stockValue DECIMAL(10,2)
GENERATED ALWAYS AS (quantityInStock*buyPrice) STORED;

SELECT productCode , 
		productName ,
        stockValue
FROM products;