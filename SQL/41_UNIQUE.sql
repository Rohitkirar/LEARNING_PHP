/*
    A UNIQUE constraint is an integrity constraint that ensures the uniqueness of values in a column or group of columns. 
    A UNIQUE constraint can be either a column constraint or a table constraint.
    A UNIQUE constraint col contain zero or more NULL value;
*/

USE hr;

CREATE TABLE suppliers(
    supplier_id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL ,
    phone VARCHAR(15) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    PRIMARY KEY (supplier_id),
    CONSTRAINT uc_name_address 
    UNIQUE(name , address)  -- checks combination of this column uniqueness
    
);

INSERT INTO suppliers(name , phone, address)
VALUES ('ROHIT KIRAR' , "1234567890" , "AHEMDABAAD" );

INSERT INTO suppliers(name , phone, address)
VALUES ('ROHIT KIRAR' , "12345678901" , "ahemdabaad" ); -- error

INSERT INTO suppliers(name , phone , address)
VALUES ('Soham BHARIT' , '1234567890' , 'ahemdabaad'); -- error duplicate entry phone

INSERT INTO suppliers(name , phone , address)
VALUES ('Soham BHARIT' , '123456789' , 'ahemdabaad'); -- successfull

INSERT INTO suppliers(name , phone , address)
VALUES ('Soham BHARIT' , '56789' , 'ahemdabaad'); -- error duplicate name 

INSERT INTO suppliers(name , phone , address)
VALUES ('Akash PAtel' , '5678934' , 'ahemdabaad'); --  successfull

INSERT INTO suppliers(name , phone , address)
VALUES ('Akash PAtel' , '56789343' , 'ahemdabaad2'); -- error duplicate name 


SELECT * FROM suppliers;

ALTER TABLE suppliers
ADD COLUMN city VARCHAR(100) ;

/* 
	Add new constraint to table SYNTAX 
    ALTER TABLE table_name
	ADD CONSTRAINT constraint_name 
	UNIQUE (column_list);
*/
-- Note that MySQL will not add a unique constraint if the existing data in the columns of specified in the unique constraint does not comply with the uniqueness rule.

ALTER TABLE suppliers
ADD CONSTRAINT uc_city
UNIQUE(city);

-- The SHOW CREATE TABLE statement shows the definition of the suppliers table:

SHOW CREATE TABLE suppliers;

-- The following SHOW INDEX statement displays all indexes associated with the suppliers table.

SHOW INDEX FROM suppliers;

-- DROP UNIQUE CONSTAINT syntax : DROP INDEX index_name ON table_name;

DROP INDEX uc_city ON suppliers;

-- using alter statement 

ALTER TABLE suppliers
DROP INDEX uc_city;

/*
 -> PRIMARY KEY VS UNIQUE
    * primary key is a combination of UNIQUE + NOT NULL CONSTRAINTS
    * Only one primary key is allowed to declare per table
    * Use to uniquely identify full table

 -> UNIQUE
    * unique constraint checks value unique only in column
    * It allows null value in column
    * declare multiple column with UNIQUE constraint
    
    Use MySQL UNIQUE constraint to enforce the uniqueness of values in a column or group of columns of a table.
*/