/*
    A foreign key in SQL is a crucial concept that establishes a relationship between two tables. Let me break it down for you:
    -> A foreign key is a column (or a group of columns) in one table that refers to the primary key in another table.
    -> The table containing the foreign key is called the child table, and the table with the primary key is called the referenced or parent table.

    Self-referencing foreign key
    -> Sometimes, the child and parent tables may refer to the same table. 
        In this case, the foreign key references back to the primary key within the same table.
        The reportTo column is a foreign key that refers to the employeeNumber column which is the primary key of the employees table.

    basic syntax of defining a foreign key constraint in the CREATE TABLE or ALTER TABLE statement:
        [CONSTRAINT constraint_name]
        FOREIGN KEY [foreign_key_name] (column_name, ...)
        REFERENCES parent_table(colunm_name,...)
        [ON DELETE reference_option]
        [ON UPDATE reference_option]

    In this syntax:

    First, specify the name of the foreign key constraint that you want to create after the CONSTRAINT keyword. If you omit the constraint name, MySQL automatically generates a name for the foreign key constraint.

    Second, specify a list of comma-separated foreign key columns after the FOREIGN KEY keywords. The foreign key name is also optional and is generated automatically if you skip it.

    Third, specify the parent table followed by a list of comma-separated columns to which the foreign key columns reference.

    Finally, specify how the foreign key maintains the referential integrity between the child and parent tables by using the ON DELETE and ON UPDATE clauses. The reference_option determines the action that MySQL will take when values in the parent key columns are deleted (ON DELETE) or updated (ON UPDATE).

    MySQL has five reference options: CASCADE, SET NULL, NO ACTION, RESTRICT, and SET DEFAULT.

    * CASCADE: if a row from the parent table is deleted or updated, the values of the matching rows in the child table are automatically deleted or updated.
    * SET NULL:  if a row from the parent table is deleted or updated, the values of the foreign key column (or columns) in the child table are set to NULL.
    * RESTRICT:  if a row from the parent table has a matching row in the child table, MySQL rejects deleting or updating rows in the parent table.
    * NO ACTION: is the same as RESTRICT.
    * SET DEFAULT: is recognized by the MySQL parser. However, this action is rejected by both InnoDB and NDB tables.

    MySQL fully supports three actions: RESTRICT, CASCADE and SET NULL.

*/
-- MySQL FOREIGN KEY examples

CREATE DATABASE fkdemo;

USE fkdemo;

-- RESTRICT & NO ACTION

CREATE TABLE categories(
    categoryId INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(100) NOT NULL
);

CREATE TABLE products(
    productId INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(100) NOT NULL,
    categoryId INT,
    FOREIGN KEY (categoryId)
        REFERENCES categories(categoryId)
);
-- Because we don’t specify any ON UPDATE and ON DELETE clauses, 
-- the default action is RESTRICT for both update and delete operations.

DESCRIBE categories;
DESCRIBE products;

INSERT INTO categories(categoryName)
VALUES ('SmartPhone'),
		('SmartWatch');

SELECT * FROM categories;

INSERT INTO products(productName , categoryId)
VALUES ('iphone' , 1 );

INSERT INTO products(productName , categoryId)
VALUES ('Samsung' , 3); -- error cannot add row value not exist in parent table

-- Because of the RESTRICT option, you cannot delete or update categoryId 1 since it is referenced by the productId 1 in the products table.

-- 2) CASCADE action

DROP TABLE products;

CREATE TABLE products(
	productId INT AUTO_INCREMENT PRIMARY KEY,
    productName varchar(100) not null,
    categoryId INT NOT NULL,
    CONSTRAINT fk_category
    FOREIGN KEY (categoryId)
		REFERENCES categories(categoryId)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);


INSERT INTO products(productName , categoryId)
VALUES ('iphone' , 1 ),
		('GALAXY NOTE' , 1),
        ('APPle Watch' , 2),
        ('Samsung GAlaxy Watch' , 2);
        
SELECT * FROM Products;

UPDATE categories
SET categoryId = 10 
WHERE categoryId = 1 ;

SELECT * FROM categories;

SELECT * FROM products; -- automatically updates value using cascade

-- Delete categoryId 2 from the categories table:

DELETE FROM categories
WHERE categoryId = 2;

SELECT * FROM categories;

SELECT * FROM products; -- it deletes the rows automatically 

-- All products with categoryId 2 from the products table was automatically deleted because of the ON DELETE CASCADE action.

-- 3) SET NULL action

DROP TABLE categories;
DROP TABLE products;

CREATE TABLE categories(
	categoryId INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(100) NOT NULL
);

CREATE TABLE products(
	productId INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(100) NOT NULL,
    categoryId INT,
    CONSTRAINT fk_category
	FOREIGN KEY (categoryId)
	REFERENCES categories(categoryId)
    ON DELETE SET NULL
    ON UPDATE SET NULL
    );
    
-- The foreign key in the products table changed to ON UPDATE SET NULL and ON DELETE SET NULL options.

INSERT INTO categories(categoryName)
VALUES('smartphone'),
		('smartwatch');
        

INSERT INTO products(productName , categoryId)
VALUES ('iphone' , 1 ),
		('Galaxy Note' , 1),
        ('APple Watch' , 2),
        ('Samsung Galaxy Watch' , 2);
        

SELECT * FROM categories;

SELECT * FROM products;

UPDATE categories
SET categoryId = 10 
WHERE categoryId = 1 ;

SELECT * FROM categories;

SELECT * FROM products; -- sets null value to fk-category


-- The rows with the categoryId 1 in the products table was automatically set to NULL due to the ON UPDATE SET NULL action.

-- 8) Delete the categoryId 2 from the categories table:

DELETE FROM categories
WHERE categoryId = 2;


SELECT * FROM categories;

SELECT * FROM products;

-- The values in the categoryId column of the rows with categoryId 2 in the products table was automatically set to NULL due to the ON DELETE SET NULL action.

-- Drop MySQL foreign key constraints
-- To drop a foreign key constraint, you use the ALTER TABLE statement:

ALTER TABLE products 
DROP FOREIGN KEY fk_category;

SHOW CREATE TABLE products; -- to ensure it is delete we check it using command
