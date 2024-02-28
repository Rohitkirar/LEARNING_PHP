/*
 ->PRIMARY KEY: A PRIMARY KEY is a combination of NOT NULL and UNIQUE constraints. 
    It uniquely identifies each row in a table. 
    Typically, a primary key is assigned to a column that serves as the table’s unique identifier

 ->In MySQL, a primary key is a column or a set of columns that uniquely identifies each row in the table. 
    A primary key column must contain unique values.
 ->If the primary key consists of multiple columns, the combination of values in these columns must be unique. 
    Additionally, a primary key column cannot contain NULL.
 ->A table can have either zero or one primary key, but not more than one.

 ->DEFINING PRIMARY KEY
    * define a primary key for a table when you create the table
        
        CREATE TABLE table_name(
        column1 datatype PRIMARY KEY,
        column2 datatype, 
        ...
        );

    * define the PRIMARY KEY constraint as a column constraint.

        CREATE TABLE table_name(
        column1 datatype,
        column2 datatype, 
        ...,
        PRIMARY KEY(column1)
        );

    * to define multicolum primary key, you list the primary key columns inside parentheses, separated by commas, followed by the PRIMARY KEY keywords.
        
        CREATE TABLE table_name(
        column1 datatype,
        column2 datatype,
        column3 datatype,
        ...,
        PRIMARY KEY(column1, column2)
        );

    * you can add a primary key to the table using the ALTER TABLE ... ADD PRIMARY KEY statement
        
        ALTER TABLE table_name
        ADD PRIMARY KEY(column1, column2, ...);
    
 ->Removing a primary key
    * if you want to do so, you can use the ALTER TABLE ... DROP PRIMARY KEY statement:
        ALTER TABLE table_name
        DROP PRIMARY KEY;
*/

USE hr;

-- defining a single column primary key

CREATE TABLE products(
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);


INSERT INTO products(id , name)
VALUES (1, 'ROHIT KIRAR'),
        (2, 'SOham Bharti'),
        (3, 'Hritik Yemde'),
        (4, 'akash Patel') ;
        
INSERT INTO products(id,name)
VALUES (1 , 'HARIOM ') ; -- error duplicate keys


-- defining single col primary key with auto increment constraint

CREATE TABLE product1(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO product1(name)
VALUES  ('laptop'),
        ('smartphone'),
        ('wireless Headphones');

SELECT * FROM product1;


-- defining multi-column primary key

CREATE TABLE customers(
    id iNT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255)  NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- multi column : The favorites table has a primary that consists of two columns customer_id and product_id.

CREATE TABLE favourites(
    customer_id INT,
    product_id INT,
    favourite_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(customer_id , product_id)
) ;


--  Adding a primary key to a table using alter 

CREATE TABLE tags(
    id INT ,
    name VARCHAR(30) NOT NULL
)

ALTER TABLE tags
ADD PRIMARY KEY(id);

-- Removing the primary Key FROM table

ALTER TABLE tags 
DROP PRIMARY KEY;






