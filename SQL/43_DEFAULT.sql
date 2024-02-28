/*
    -> MySQL DEFAULT constraint allows you to specify a default value for a column.
    -> Here’s the syntax of the DEFAULT constraint:
        
        column_name data_type DEFAULT default_value;

    -> specify the DEFAULT keyword followed by the default value for the column. 
    -> The type of the default value matches the data type of the column.

    -> The default_value must be a literal constant, e.g., a number or a string. 
    It cannot be a function or an expression. However, 
    MySQL allows you to set the current date and time (CURRENT_TIMESTAMP) to the TIMESTAMP and DATETIME columns.

    -> NOTE When you define a column without the NOT NULL constraint, the column will implicitly take NULL as the default value.

    -> If a column has a DEFAULT constraint and the INSERT or UPDATE statement doesn’t provide the value for that column, 
        MySQL will use the default value specified in the DEFAULT constraint.
    
    NOTE : 
    -> you set the DEFAULT constraints for columns when you create the table. 
    -> MySQL also allows you to add default constraints to the columns of existing tables. 
    -> If you don’t want to use default values for columns, you can remove the default constraints.

    SUMMARY

    -> MySQL DEFAULT constraints set default values for columns.

    -> Use DEFAULT default_value to set a default constraint to a column.

    -> Use ALTER TABLE ... ALTER COLUMN ... SET DEFAULT to add a DEFAULT constraint to a column of an existing table.

    -> Use ALTER TABLE ... ALTER COLUMN ... DROP DEFAULT to drop a DEFAULT constraint from a column of an existing table.

*/

USE classicmodels;

-- default constrait example 

CREATE TABLE cart_items(
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DEC(5,2) NOT NULL,
    sales_tax DEC(5,2) NOT NULL DEFAULT 0.1
);

DESC cart_items;

INSERT INTO cart_items(name , quantity , price)
VALUES ('keyboard' , 1 , 50);

SELECT * FROM cart_items;

-- Also, you can explicitly use the DEFAULT keyword when you insert a new row into the cart_items table:


INSERT INTO cart_items(name, quantity , price , sales_tax)
VALUES ('Battery' , 4, 0.25 , DEFAULT);

-- To add a default constraint to a column of an existing table, you use the ALTER TABLE statement:

ALTER TABLE cart_items
ALTER COLUMN quantity
SET DEFAULT 1;

DESC cart_items;

-- The following statement inserts a new row into the cart_items table without specifying a value for the quantity column:

INSERT INTO cart_items(name , price , sales_tax)
VALUES('Maintenance Services' , 30 , 0 );

SELECT * FROM cart_items;

-- To remove a DEFAULT constraint from a column, you use the ALTER TABLE statement:

ALTER TABLE cart_items
ALTER COLUMN quantity DROP DEFAULT;

DESCRIBE cart_items;
